var canvas = document.querySelector('canvas');
var c = canvas.getContext('2d');
canvas.width = innerWidth;
canvas.height = innerHeight;

var grid = innerWidth/41;
var height = 30;

var mouse = {
	x: 0 ,
	y: innerHeight / 2
};

var colors = [
	'#2185c5',
	'#7ecefd',
	'#fff6e5',
	'#ff7f66'
]

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

});

function Rectangle(x, y, w, h, color){
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	this.color = color;
	var pointDepartY = y;

	this.draw = function(){
		c.fillStyle = this.color;
		c.fillRect(this.x, this.y, this.w, this.h);
	};

	this.update = function(){
			// Si la souris est contenue dans la zone pour faire réagir le rectangle
			if(mouse.x > this.x && mouse.x < this.x + this.w){
					this.h += (this.y - mouse.y)*0.05;
					this.y -= (this.y - mouse.y)*0.05;
			} else if(this.h > height && this.y < pointDepartY){
				this.h -= 3;
				this.y += 3;
				if(this.h < height){
					this.h = height;
				}
			}

		this.draw();
	};
}

let rectOne = new Rectangle(grid, innerHeight - height, grid*3, height, '#E36D60');
let rectTwo = new Rectangle(grid*5, innerHeight - height, grid*3, height, '#485058');
let rectThree = new Rectangle(grid*9, innerHeight - height, grid*3, height, '#F5D33C');
let rectFour = new Rectangle(grid*13, innerHeight - height, grid*3, height, '#F1ECE9');
let rectFive = new Rectangle(grid*17, innerHeight - height, grid*3, height, '#D7443F');
let rectSix = new Rectangle(grid*21, innerHeight - height, grid*3, height, '#81CF77');
let rectSeven = new Rectangle(grid*25, innerHeight - height, grid*3, height, '#B23387');
let rectEight = new Rectangle(grid*29, innerHeight - height, grid*3, height, '#CF622B');
let rectNine = new Rectangle(grid*33, innerHeight - height, grid*3, height, '#3AC7CC');
let rectTen = new Rectangle(grid*37, innerHeight - height, grid*3, height, '#578BB2');

function animate() {
	requestAnimationFrame(animate);
	c.clearRect(0, 0, innerWidth, innerHeight);

	rectOne.update();
	rectTwo.update();
	rectThree.update();
	rectFour.update();
	rectFive.update();
	rectSix.update();
	rectSeven.update();
	rectEight.update();
	rectNine.update();
	rectTen.update();
}

animate();