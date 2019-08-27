var canvas = document.querySelector('canvas');

var ww = window.innerWidth;
var wh = window.innerHeight;
canvas.width = ww;
canvas.height = wh;

var c = canvas.getContext('2d');
var maxRadius = 40;
var minRadius = 4;

var mouse = {
	x: undefined,
	y: undefined
}

var colorArray = [
	'#4683db',
	'#4C8DCA',
	'#78E5EB',
	'#F5F0F2',
	'#E12D53'
];


window.addEventListener('mousemove', function(e){
	mouse.x = e.x;
	mouse.y = e.y;
});

window.addEventListener('resize', function(){
	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;
});

function Circle(x, y, dx, dy, radius){
	this.x = x;
	this.y = y;
	this.dx = dx;
	this.dy = dy;
	this.radius = radius;
	this.color = colorArray[Math.floor(Math.random()*colorArray.length)];
	var loupe = 60;

	this.draw = function(){
		c.beginPath();
		c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
		c.fillStyle = this.color;
		c.fill();
	}

	this.update = function(){
		if(this.x + this.radius >= innerWidth || this.x - this.radius <= 0){
			this.dx = -this.dx;
		}
		if(this.y + this.radius >= innerHeight || this.y - this.radius <= 0){
			this.dy = -this.dy;
		}

		this.x += this.dx;
		this.y += this.dy;

		if(mouse.x - this.x < loupe && mouse.x - this.x > -loupe && mouse.y - this.y < loupe && mouse.y - this.y > -loupe){
			if(this.radius < maxRadius){
				this.radius += 1.8;
			}
		}
		else if (this.radius > minRadius){
			this.radius -= 1.8;
		}

		this.draw();
	}
}

var circleArray = [];
for (var i=0; i < 800; i++){
	var radius = Math.floor(Math.random()*5 + 4);
	var x = Math.random() * (innerWidth - radius*2) + radius;
	var y = Math.random() * (innerHeight - radius*2) + radius;
	var dx = (Math.random() - 0.5) * 5;
	var dy = (Math.random() - 0.5) * 5;
	circleArray.push(new Circle(x, y, dx, dy, radius));
}

function animate() {
	requestAnimationFrame(animate);

	c.clearRect(0, 0, innerWidth, innerHeight);

	for(var i = 0; i < circleArray.length; i++){
		circleArray[i].update();
	}
}

animate();