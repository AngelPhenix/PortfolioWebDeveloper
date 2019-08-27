var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');
canvas.width = 800;
canvas.height = 560;

var grid = 16;
var player = new Snake();
var apple = new Apple();
var score = 0;
var count = 0;

function randomIntFromRange(min,max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}

window.addEventListener('keydown', function(e){
	// Gauche
	if(e.keyCode == 37 && player.xSpeed == 0){
		player.xSpeed = -grid;
		player.ySpeed = 0;
	}
	// Haut
	if(e.keyCode == 38 && player.ySpeed == 0){
		player.xSpeed = 0;
		player.ySpeed = -grid;
	}
	// Droite
	if(e.keyCode == 39 && player.xSpeed == 0){
		player.xSpeed = grid;
		player.ySpeed = 0;
	}
	// Bas
	if(e.keyCode == 40 && player.ySpeed == 0){
		player.xSpeed = 0;
		player.ySpeed = grid;
	}
});

function Snake(){
	this.x = 160;
	this.y = 160;
	this.xSpeed = grid;
	this.ySpeed = 0;
	this.cells = [];
	this.maxCells = 4;

	this.draw = function(){
		c.fillStyle = 'lime';
		c.fillRect(this.x, this.y, grid-1, grid-1);
	}

	this.update = function(){
		this.x += this.xSpeed;
		this.y += this.ySpeed;

		if(this.x < 0){
			this.x = canvas.width - grid;
		}
		if(this.x >= canvas.width){
			this.x = 0;
		}
		if(this.y < 0){
			this.y = canvas.height - grid;
		}
		if(this.y >= canvas.height){
			this.y = 0;
		}

		// Tête est dans cells[0] puisque la fonction unshift ajoute la valeur x,y à chaque déplacement en index[0]
		this.cells.unshift({x:this.x,y:this.y});
		// si la taille du serpent est plus grande que son score : Effacer la dernière case
		if(this.cells.length > this.maxCells){
			this.cells.pop();
		}

		// Pour chaque cellule du serpent
		this.cells.forEach(function(cell, index){
			c.fillStyle = 'green';
			c.fillRect(cell.x, cell.y, grid-1, grid-1);

			// Pour chaque cellule du serpent
			for(var i = index+1; i < player.cells.length; i++){
				// Vérifier s'il y a collision avec n'importe quelle cellule du serpent
				if(cell.x == player.cells[i].x && cell.y == player.cells[i].y){
					// S'il y a collision : Reset le jeu
					player = new Snake();
					apple = new Apple();
					score = 0;
				}
			}
		});

		this.draw();
	}

	this.direction = function(x, y){
		this.xSpeed = x;
		this.ySpeed = y;
	}
}

function Apple(){
	this.x = randomIntFromRange(1, (canvas.width/grid)-1) * grid;
	this.y = randomIntFromRange(1, (canvas.height/grid)-1) * grid;

	this.draw = function(){
		c.fillStyle = 'red';
		c.fillRect(this.x, this.y, grid-1, grid-1);
	}

	this.update = function(){
		if(player.x == this.x && player.y == this.y){
			player.maxCells++;
			score++;
			this.x = randomIntFromRange(1, (canvas.width/grid)-1) * grid;
			this.y = randomIntFromRange(1, (canvas.height/grid)-1) * grid;
		}

		this.draw();
	}

}

function animate() {
	requestAnimationFrame(animate);

	if (++count < 4) {
    	return;
  	}
  	count = 0;

	c.clearRect(0, 0, canvas.width, canvas.height);

	apple.update();
	player.update();


	//On déplace la pomme si elle apparait dans la queue du serpent.
	player.cells.forEach(function(cell, index){
		for(var i = index+1; i < player.cells.length; i++){
			// Vérifier s'il y a collision avec n'importe quelle cellule du serpent
			if(apple.x == player.cells[i].x && apple.y == player.cells[i].y){
				console.log("Pomme dans le serpent ! Yikes!");
				apple.x = randomIntFromRange(1, (canvas.width/grid)-1) * grid;
				apple.y = randomIntFromRange(1, (canvas.height/grid)-1) * grid;
			}
		}
	});

	c.beginPath();
	c.font = "80px Verdana";
	c.textAlign = "center";
	c.fillStyle = "#2591EC";
	c.fillText(score, canvas.width/2, 100);
	c.closePath();
}

animate();