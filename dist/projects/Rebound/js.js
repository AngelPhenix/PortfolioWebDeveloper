// On déclare la variable canvas pour pouvoir l'utiliser plus facilement
var canvas = document.querySelector('canvas');
// Contexte 2D
var c = canvas.getContext('2d');

// On stock la taille intérieure du navigateur : Largeur et longueur
canvas.width = innerWidth;
canvas.height = innerHeight;

var mouse = {
	x: innerWidth / 2 ,
	y: innerHeight / 2
};

// var colors = [
// 	'#D62EB2',
// 	'#801CA2',
// 	'#50B0A6',
// 	'#FFD508',
// 	'#EA1C31'
// ];

var colors = [
	'#0F6CA6',
	'#CFD6B9',
	'#1AB6D9',
	'#BF6545',
	'#732D2D'
];

var gravity = 1;
var friction = 0.95;
var frictionX = 0.99;

function randomIntFromRange(min,max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}

function randomColor(colors) {
	return colors[Math.floor(Math.random() * colors.length)];
}

window.addEventListener('resize', function(){
	canvas.width = innerWidth;
	canvas.height = innerHeight;
});

window.addEventListener('mousemove', function(e){
	mouse.x = e.x;
	mouse.y = e.y;
});

window.addEventListener('click', function(){
	init();
});

function Ball(x, y, dx, dy, radius, color){
	this.x = x;
	this.y = y;
	this.dx = dx;
	this.dy = dy;
	this.radius = radius;
	this.color = color;

	this.update = function(){
		if(this.y + this.radius + this.dy > innerHeight){
			this.dy = -this.dy * friction;
		} else {
			this.dy += gravity;
		}

		if(this.y + this.radius + this.dy > innerHeight && this.dy < 0.05){
			this.dx = this.dx * frictionX;
		}

		if(this.x + this.radius + this.dx > innerWidth || this.x - this.radius <= 0){
			this.dx = -this.dx;
		}

		this.x += this.dx;
		this.y += this.dy;
		this.draw();
	};

	this.draw = function(){
		c.beginPath();
		c.arc(this.x, this.y, this.radius, 0, Math.PI*2, false);
		c.fillStyle = this.color;
		c.stroke();
		c.fill();
	};
}

// Implementation
var ball;
var ballArray;
function init(){
	ballArray = [];
	for(var i = 0; i < 300; i++){
		const radius = randomIntFromRange(10,20);
		const x = randomIntFromRange(radius, innerWidth - radius);
		const y = randomIntFromRange(0, innerHeight/2+50);
		const dx = randomIntFromRange(-2, 2);
		const color = randomColor(colors);

		ballArray.push(new Ball(x, y, dx, 2, radius, color));
	}
}

// Fonction appelée à répétition permettant l'animation du canvas (Toutes les millisecondes)
function animate() {
	// On boucle l'animation afin qu'elle ne s'arrête jamais
	requestAnimationFrame(animate);

	c.clearRect(0, 0, innerWidth, innerHeight);

	for(var i = 0; i < ballArray.length; i++){
		ballArray[i].update();
	}
}

init();
animate();