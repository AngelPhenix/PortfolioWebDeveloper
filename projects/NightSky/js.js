// On déclare la variable canvas pour pouvoir l'utiliser plus facilement
var canvas = document.querySelector('canvas');

// On stock la taille intérieure du navigateur : Largeur et longueur
canvas.width = innerWidth;
canvas.height = innerHeight;

// Contexte 2D
var c = canvas.getContext('2d');
var maxRadius = 3;

var mouse = {
	x: undefined,
	y: undefined
}

// Garder le canvas à la taille correcte lorsqu'il y a un resize
window.addEventListener('resize', function(){
	canvas.width = innerWidth;
	canvas.height = innerHeight;
});

window.addEventListener('click', function(e){
	mouse.x = e.x;
	mouse.y = e.y; 
	var radius = Math.floor(Math.random()* maxRadius + 1);
	var color = [
		'#fffa86',
		'#ffd27d',
		'#FFD700'
	];
	circles.push(new Circle(mouse.x, mouse.y, radius, color[Math.floor(Math.random()*color.length)]));
});

// Constructeur de cercles
function Circle(x, y, radius, color){
	this.x = x;
	this.y = y;
	this.radius = radius;
	this.growing = false;
	this.pulsating = true;
	this.color = color;

	// Fonction permettant l'apparition des cercles (taille/couleurs)
	this.draw = function(){
		c.beginPath();
		c.arc(this.x, this.y, this.radius, Math.PI * 2, false);
		c.strokeStyle = this.color;
		c.fillStyle = this.color;
		c.stroke();
		c.fill();
	}

	// Fonction appelée à chaque requestAnimationFrame permettant d'animer les cercles.
	this.update = function(){

		// this.growing = false;
		if(this.pulsating) {
		    if(this.growing) {
		        this.radius += growth;
		        if(this.radius >= radius) {
		            this.radius = radius;
		            this.growing = false;
		        }
		    } else {
		        this.radius -= growth;
		        if(this.radius <= 0) {
		            this.radius = 0;
		            this.growing = true;
		        }
		    }
		}

		this.draw();
	}
}

// Array contenant tous les cercles créés avant d'y être détruit
var circles = [];

for (var i=0; i < 1300; i++){
	var radius = Math.floor(Math.random()* maxRadius + 1);
	var growth = Math.random() * 0.05 + 0.005;
	var x = Math.random() * (innerWidth - radius*2) + radius;
	var y = Math.random() * (innerHeight - radius*2) + radius;
	var color = 'rgb(150, 207, 234)';
	circles.push(new Circle(x, y, radius, color));
}

// Fonction appelée à répétition permettant l'animation du canvas (Toutes les millisecondes)
function animate() {
	// On boucle l'animation afin qu'elle ne s'arrête jamais
	requestAnimationFrame(animate);
	// On efface le canvas tout entier avant de re-dessiner les éléments
	c.clearRect(0, 0, innerWidth, innerHeight);
	// On ajoute les cercles.
	for (var i = 0; i < circles.length; ++i) {
		circles[i].update();
	}
}

animate();