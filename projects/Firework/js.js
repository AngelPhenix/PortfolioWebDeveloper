var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');
canvas.width = innerWidth;
canvas.height = innerHeight;

var mouse = {
	x: undefined,
	y: undefined
};

var colors = [
	'#2185c5',
	'#7ecefd',
	'#fff6e5',
	'#ff7f66'
]

var paquets = [];
var gravity = 0.3;

function randomIntFromRange(min,max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}

function randomColor(colors) {
	return colors[Math.floor(Math.random() * colors.length)];
}

function randomFloatFromRange(min,max) {
	return Math.random() * (max - min + 1) + min;
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
	paquets.push(new Missile(innerWidth/2, innerHeight, 30, 'yellow'));
});

function getDistance(x1, y1, x2, y2){
	var distanceX = x2 - x1;
	var distanceY = y2 - y1;
	return Math.sqrt(Math.pow(distanceX, 2) + Math.pow(distanceY, 2));
}

function Missile(x, y, radius, color){
	this.x = x;
	this.y = y;
	this.radius = radius;
	this.color = color;
	this.lastMouse = {
		x: mouse.x,
		y: mouse.y
	};

	this.draw = function(){
		c.beginPath();
		c.arc(this.x, this.y, this.radius, 0, Math.PI*2, false);
		c.fillStyle = this.color;
		c.fill();
		c.closePath();
	};

	this.update = function(){
		this.x -= (this.x - this.lastMouse.x)*0.05;
		this.y -= (this.y - this.lastMouse.y)*0.05;

		this.draw();
	};
}

function Circle(x, y, color){
	const max = 8;
	this.x = x;
	this.y = y;
	this.radius = 4;
	this.velocityX = randomFloatFromRange(-max, max);
	this.velocityY = randomFloatFromRange(-max, max);
	this.alpha = 1;
	// Remplacer color par "'hsla('+randomIntFromRange(0,360)+', 100%, 50%, x)';" pour avoir pleins de couleurs différentes
	this.color = color;

	this.draw = function(){
		c.beginPath();
		c.arc(this.x, this.y, this.radius, 0, Math.PI*2, false);
		c.fillStyle = this.color.replace('x', +this.alpha);
		c.fill();
		c.closePath();
	};

	this.update = function(){
		this.x += this.velocityX;
		this.y += this.velocityY;
		this.velocityY += 0.17;
		this.alpha -= 0.016;

		this.draw();
	};
}

var particles = [];

function createParticles(x, y){
	var couleur = 'hsla('+randomIntFromRange(0,360)+', 100%, 50%, x)';
	for(var i = 0; i < 150; i++){
		particles.push(new Circle(x, y, couleur));
	}
}

function animate() {
	requestAnimationFrame(animate);
	c.clearRect(0, 0, innerWidth, innerHeight);

	for(var i = 0; i < paquets.length; i++){
		paquets[i].update();

		if(getDistance(paquets[i].x, paquets[i].y, paquets[i].lastMouse.x, paquets[i].lastMouse.y) <= 10){
			createParticles(paquets[i].x, paquets[i].y);
			paquets.splice(i, 1);
		}
	}

	// Update les particules et les supprime si invisible
	particles.forEach(function(particle){
		particle.update();
		if(particle.alpha <= 0){
			particles.splice(this, 1);
		}
	});
}

animate();