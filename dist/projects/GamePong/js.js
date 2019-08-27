// On déclare la variable canvas pour pouvoir l'utiliser plus facilement
var canvas = document.querySelector('canvas');
// Contexte 2D
var c = canvas.getContext('2d');

// On stock la taille intérieure du navigateur : Largeur et longueur
canvas.width = innerWidth;
canvas.height = innerHeight;

var mouse = {
	x: undefined,
	y: undefined
}

var score1 = 0;
var score2 = 0;
var gameHasStarted = false;
var goal = false;
var aiSpeed = 3;

// Garder le canvas à la taille correcte lorsqu'il y a un resize
window.addEventListener('resize', function(){
	canvas.width = innerWidth;
	canvas.height = innerHeight;
});

window.addEventListener('mousemove', function(e){
	mouse.x = e.x;
	mouse.y = e.y;

	player1.y = mouse.y - 100/2;
	player2.y = mouse.y - 100/2;
});

window.addEventListener('click', function(){
		gameHasStarted = true;
});

function Circle(color){
	this.x = ball.lastX;
	this.y = ball.lastY;
	this.radius = ball.radius;
	this.growth = 60;
	this.color = color;

	this.draw = function(){
		c.beginPath();
		c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
		c.lineWidth = 2;
		c.setLineDash([]);
		c.strokeStyle = this.color;
		c.stroke();
		c.fillStyle = this.color;
		c.fill();
	}

	this.update = function() {
		this.radius += this.growth;
		this.draw();
	}
}

function Player(x){
	this.x = x;
	this.y = innerHeight/2;
	this.width = 15;
	this.height = 100;

	this.draw = function(){
		c.beginPath();
		c.setLineDash([]);
		c.fillStyle = 'white';
		c.fillRect(this.x, this.y, this.width, this.height);
		c.closePath();
	};

	this.update = function(){
		this.draw();
	};
}

function Ball(){
	this.x = innerWidth/2;
	this.y = innerHeight/2+ 100/2;
	this.radius = 7;
	this.velocityX = 7;
	this.velocityY = 3;
	this.goingLeft = true;
	this.goingRight = false;
	this.lastX = 0;
	this.lastY = 0;

	this.draw = function(){
		c.beginPath();
		c.fillStyle = 'white';
		c.arc(this.x, this.y, this.radius, 0, Math.PI*2, false);
		c.fill();
	}

	this.update = function(){
		// La balle va à gauche de l'écran
		if(this.goingLeft){
			// On réduit son X en fonction de sa vélocité (Elle part à gauche)
			this.x -= this.velocityX;
			this.y += this.velocityY;
			// Si la balle touche le player 1
			if(ball.x <= player1.x + player1.width + this.radius){
				// ET Si la balle est contenue dans le Y du player1, elle fait demi-tour et passe en mouvement vers la droite
				if(ball.y > player1.y && ball.y < player1.y + player1.height){
					// La moitié haute du player1 à été touchée
					if(ball.y > player1.y && ball.y < player1.y + player1.height/2){
						this.velocityY = this.velocityY - 1;
					}
					else {
						this.velocityY = this.velocityY + 1;
					}
					this.goingLeft = false;
					this.goingRight = true;
					this.velocityX = this.velocityX + 0.75;
				}
				else {
					this.lastX = this.x;
					this.lastY = this.y;
					pointTaken("left");
					score2++;
					reset();
				}
			}
		}
		// La balle va à droite de l'écran
		if(this.goingRight){
			// On augmente son X en fonction de sa vélocité (Elle part à droite)
			this.x += this.velocityX;
			this.y += this.velocityY;
			// Si la balle touche le player 2
			if(ball.x >= player2.x - this.radius){
				// ET Si la balle est contenue dans le Y du player2, elle fait demi-tour et passe en mouvement vers la gauche
				if(ball.y > player2.y && ball.y < player2.y + player2.height){
					// La moitié haute du player2 à été touchée
					if(ball.y > player2.y && ball.y < player2.y + player2.height/2){
						this.velocityY = this.velocityY - 1;
					}
					else {
						this.velocityY = this.velocityY + 1;
					}
					this.goingRight = false;
					this.goingLeft = true;
					this.velocityX = this.velocityX + 0.75;
				}
				else {
					this.lastX = this.x;
					this.lastY = this.y;
					pointTaken("right");
					score1++;
					reset();
				}
			}
		}
		// La balle touche le bord de l'écran en vertical
		if(ball.y - ball.radius <= 0 || ball.y + ball.radius >= innerHeight){
			this.velocityY = -this.velocityY;
		}

		this.draw();
	}
}

function gameStart(){
	if(!gameHasStarted){
		c.save();
		c.beginPath();
		c.shadowColor = "rgb(0, 0, 0)";
      	c.shadowOffsetX = 10;
      	c.shadowOffsetY = 10
      	c.shadowBlur = 10;
		c.font = "50px Verdana";
		var gradient = c.createLinearGradient(0,0,innerWidth,0);
		gradient.addColorStop(0,"#FF7300");
		gradient.addColorStop(1,"#2591EC");
		c.fillStyle = gradient;
		c.textAlign="center";
		c.lineWidth = 2;
		c.setLineDash([]);
		c.fillText("Appuyez sur la souris pour démarrer la partie !", innerWidth/2, innerHeight/2);
		c.closePath();
		c.restore();
	}
	else {
		player1.update();
		player2.update();
		ball.update();
	}
}

function reset(){
	ball.x = innerWidth/2;
	ball.y = innerHeight/2 + 100/2;
	ball.velocityX = 7;
	ball.velocityY = 3;
}

function gameWon(){
	score1 = 0;
	score2 = 0;
	gameHasStarted = false;
}

function pointTaken(side){
	if(side == "left"){
		for(var j = 0; j < 1; j++){
			goal = true;
			// Nouveau cercle bleu
			points.push(new Circle("rgba(37,145,236,0.05)"));
		}
	}
	else {
		for(var j = 0; j < 1; j++){
			goal = true;
			// Nouveau cercle orange
			points.push(new Circle("rgba(255,115,0,0.05)"));
		}
	}
}

var player1 = new Player(15);
var player2 = new Player(innerWidth-30);
var ball = new Ball();
var points = [];

// Fonction appelée à répétition permettant l'animation du canvas (Toutes les millisecondes)
function animate() {
	requestAnimationFrame(animate);
	c.clearRect(0, 0, innerWidth, innerHeight);

	// SCORES
	c.beginPath();
	c.font = "100px Verdana";
	c.textAlign="center";
	// orange
	c.fillStyle = "#FF7300";
	c.fillText(score1, innerWidth/2-120, 100);
	// Bleu
	c.fillStyle = "#2591EC";
	c.fillText(score2, innerWidth/2+120, 100);
	c.closePath();

	// Trait vertical milieu screen
	c.beginPath();
	c.setLineDash([35, 10]);
	c.moveTo(innerWidth/2, 0);
	c.lineTo(innerWidth/2, innerHeight);
	c.lineWidth = 5;
	c.strokeStyle = 'white';
	c.stroke();
	c.closePath();

	gameStart();

	// SCORE CONTROL
	if(score1 === 3 || score2 === 3){
		gameWon();
	}

	if(goal){
		for (var i = 0; i < points.length; ++i) {
			points[i].update();
			if(points[i].radius > 2000){
				points.splice(i, 1);
			}
		}
	}

	// AI CONTROLS
	// if(player2.y + player2.height/2 < ball.y){
	// 	player2.y += aiSpeed;
	// } else {
	// 	player2.y -= aiSpeed;
	// }
}

animate();