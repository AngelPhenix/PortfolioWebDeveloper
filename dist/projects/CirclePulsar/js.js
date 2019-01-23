// On déclare la variable canvas pour pouvoir l'utiliser plus facilement
var canvas = document.querySelector('canvas');

// On stock la taille intérieure du navigateur : Largeur et longueur
canvas.width = innerWidth;
canvas.height = innerHeight;

// Contexte 2D
var c = canvas.getContext('2d');

// On place la souris au milieu du canvas au chargement de la page afin d'avoir un visuel
var mouse = {
	x: innerWidth/2,
	y: innerHeight/2
}

// Palette de rouge.
// Palette de départ.
var reds = 
	[
	'rgba(127, 0, 0, x)',
	'rgba(255, 76, 76, x)',
	'rgba(255, 0, 0, x)',
	'rgba(127, 38, 38, x)',
	'rgba(204, 0, 0, x)'
	];
// Palette de vert
var greens = 
	[
	'rgba(78, 165, 83, x)',
	'rgba(88, 115, 90, x)',
	'rgba(42, 89, 45, x)',
	'rgba(128, 165, 130, x)',
	'rgba(114, 242, 122, x)'
	];
// Palette de rose/violet
var pinks = 
	[
	'rgba(127, 0, 85, x)',
	'rgba(255, 76, 196, x)',
	'rgba(255, 0, 171, x)',
	'rgba(255, 178, 229, x)',
	'rgba(204, 0, 137, x)'
	];
// Palette de jaune
var yellows = 
	[
	'rgba(123, 113, 42, x)',
	'rgba(255, 243, 165, x)',
	'rgba(251, 230, 87, x)',
	'rgba(123, 118, 80, x)',
	'rgba(200, 183, 69, x)'
	];
// Palette de bleu
var blues = 
	[
	'rgba(63, 101, 127, x)',
	'rgba(202, 233, 255, x)',
	'rgba(126, 203, 255, x)',
	'rgba(101, 116, 127, x)',
	'rgba(101, 162, 204, x)'
	]

// On stock toutes les couleurs et leurs différents tons dans une Array
var colorArray = [reds, greens, pinks, yellows, blues];
// On fixe la palette de départ comme étant celle ayant le premier indice de colorArray
var colors = colorArray[0];

// Garder les coordonnées de la souris en fonction des mouvements (toutes les millisecondes?)
window.addEventListener('mousemove', function(e){
	mouse.x = e.x;
	mouse.y = e.y;
});

// Ajouter un cercle là où la souris se trouve
window.addEventListener('click', function(){
	colorArray.push(colorArray.shift());
	colors = colorArray[0];
	circles.push(new Circle(mouse.x, mouse.y, 0, 0, 10, 20));
});

// Garder le canvas à la taille correcte lorsqu'il y a un resize
window.addEventListener('resize', function(){
	canvas.width = innerWidth;
	canvas.height = innerHeight;
});

// Constructeur de cercles
function Circle(x, y, dx, dy, radius, growth){
	this.x = x;
	this.y = y;
	this.dx = dx;
	this.dy = dy;
	this.radius = radius;
	this.color = colors[Math.floor(Math.random()*colors.length)];
	this.alpha = 1;

	// Fonction permettant l'apparition des cercles (taille/couleurs)
	this.draw = function(){
		c.beginPath();
		c.strokeStyle = this.color.replace('x', +this.alpha);
		c.arc(this.x, this.y, this.radius, Math.PI * 2, false);
		c.lineWidth = 2;
		c.stroke();
		c.fillStyle = "transparent";
		c.fill();
	}

	// Fonction appelée à chaque requestAnimationFrame permettant d'animer les cercles.
	this.update = function(){
		this.x += this.dx;
		this.y += this.dy;
		this.radius += growth;
		this.alpha -= 0.015;
		this.draw();
	}
}

// Array contenant tous les cercles créés avant d'y être détruit
var circles = [];

// Fonction appelée à répétition permettant l'animation du canvas (Toutes les millisecondes)
function animate() {
	// On boucle l'animation afin qu'elle ne s'arrête jamais
	requestAnimationFrame(animate);
	// On efface le canvas tout entier avant de re-dessiner les éléments
	c.clearRect(0, 0, innerWidth, innerHeight);
	// Variable aléatoires pour la vélocité X, Y et le radius dans une limite raisonnable
	var dx = (Math.random() - 0.5) * 5 + (Math.random() < 0.5 ? -2 : 2);
	var dy = (Math.random() - 0.5) * 5 + (Math.random() < 0.5 ? -2 : 2);
	var radius = Math.random() * 20 + 30;
	// On ajoute les cercles.
	circles.push(new Circle(mouse.x, mouse.y, dx, dy, radius, -0.5));
	for (var i = 0; i < circles.length; ++i) {
		circles[i].update();
		if(circles[i].alpha < 0 || circles[i].radius < 3){
			circles.splice(i, 1);
		}
	}
}

animate();