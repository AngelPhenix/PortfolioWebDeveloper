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

// Couleurs "normales"
var colors0 = ['#2185c5','#7ecefd','#fff6e5','#ff7f66'];
// Rouge / Jaune / Bleu
var colors1 = ['#B21242','#FFEE19','#FF004C','#14A2CC','#098CB2'];
// Blanc / Rouge / Bleu / Jaune
var colors2 = ['#EBF4F7','#E00B27','#1A2A40','#2474A6','#F2A30F'];
// Rose / Bleu / Crème
var colors3 = ['#BE3571','#B8BDD8','#0355C2','#BFA066','#D7CEC1'];
// Haut contraste Bleu / Blanc / Rouge / Orange
var colors4 = ['#87CCE5','#FFFFFF','#FF0000','#0F034A','#FC7E00'];
// Calme / Rose / Bleu / Rouge
var colors5 = ['#F25774','#1E2A38','#292526','#D9A86C','#BF2E21'];
// Teinte Bleue + Orange
var colors6 = ['#1598CB','#13547A','#8AE0D7','#21CE98','#EE795A'];

var colorArray = [colors0, colors1, colors2, colors3, colors4, colors5, colors6];
var colors = colorArray[0];

// Garder le canvas à la taille correcte lorsqu'il y a un resize
window.addEventListener('resize', function(){
	canvas.width = innerWidth;
	canvas.height = innerHeight;
});

window.addEventListener('mousemove', function(e){
	mouse.x = e.x;
	mouse.y = e.y;

	  // particles.forEach(function(Particle){
   //      Particle.velocity += 0.01;
   //      Particle.update();
   //  });
});

window.addEventListener('click', function(){
	c.clearRect(0, 0, innerWidth, innerHeight);
	colorArray.push(colorArray.shift());
	var colors = colorArray[0];
	particles.forEach(function(Particle){
		Particle.color = colors[Math.floor(Math.random()*colors.length)];
		Particle.update();
	});
});

function randomIntFromRange(min,max){
	return Math.floor(Math.random() * (max-min+1) + min);
}

function Particle(x, y, radius){
	this.x = x;
	this.y = y;
	this.radius = radius;
	this.color = colors[Math.floor(Math.random()*colorArray[0].length)];
	this.radians = Math.random() * Math.PI*2;
	this.velocity = 0.05;
	this.distanceFromCenter = randomIntFromRange(50,230);
	this.lastMouse = {
		x: x,
		y: y
	};

	this.update = function(){
		var lastPoint = {
			x: this.x,
			y: this.y
		};

		// Move points over time
		this.radians += this.velocity;

		// Drag effect
		this.lastMouse.x += (mouse.x - this.lastMouse.x) * 0.05;
		this.lastMouse.y += (mouse.y - this.lastMouse.y) * 0.05;

		// Circular Motion
		this.x = this.lastMouse.x + Math.cos(this.radians) * this.distanceFromCenter;
		this.y = this.lastMouse.y + Math.sin(this.radians) * this.distanceFromCenter;

		this.draw(lastPoint);
	};

	this.draw = function(lastPoint){
		c.beginPath();
		c.strokeStyle = this.color;
		c.lineWidth = this.radius;
		c.moveTo(lastPoint.x, lastPoint.y);
		c.lineTo(this.x, this.y);
		c.stroke();
		c.closePath();
	};
}

var particles = [];
for(var i = 0; i < 100; i++){
	var radius = randomIntFromRange(3,5);
	particles.push(new Particle(innerWidth/2, innerHeight/2, radius));
}

// Fonction appelée à répétition permettant l'animation du canvas (Toutes les millisecondes)
function animate() {
	// On boucle l'animation afin qu'elle ne s'arrête jamais
	requestAnimationFrame(animate);

	c.fillStyle = 'rgba(0, 0, 0, 0.10)';
	c.fillRect(0, 0, canvas.width, canvas.height);

	particles.forEach(function(Particle){
		Particle.update();
	});
}

animate();