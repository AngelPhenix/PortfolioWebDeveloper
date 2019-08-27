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

var colors = [
	"#2185c5",
	"#7ecefd",
	"#ff7f66"
]

// Garder le canvas à la taille correcte lorsqu'il y a un resize
window.addEventListener('resize', function(){
	canvas.width = innerWidth;
	canvas.height = innerHeight;
});

window.addEventListener('mousemove', function(e){
	mouse.x = e.x;
	mouse.y = e.y;
});

function randomIntFromRange(min, max){
	return Math.floor(Math.random() * (max - min + 1) + min);
}

function distance(x1, y1, x2, y2) {
	const xDist = x2 - x1;
	const yDist = y2 - y1;

	return Math.sqrt(Math.pow(xDist, 2) + Math.pow(yDist, 2));
}

function randomColor(colors) {
	return colors[Math.floor(Math.random() * colors.length)];
}

/**
 * Rotates coordinate system for velocities
 *
 * Takes velocities and alters them as if the coordinate system they're on was rotated
 *
 * @param  Object | velocity | The velocity of an individual particle
 * @param  Float  | angle    | The angle of collision between two objects in radians
 * @return Object | The altered x and y velocities after the coordinate system has been rotated
 */

function rotate(velocity, angle) {
    const rotatedVelocities = {
        x: velocity.x * Math.cos(angle) - velocity.y * Math.sin(angle),
        y: velocity.x * Math.sin(angle) + velocity.y * Math.cos(angle)
    };

    return rotatedVelocities;
}

/**
 * Swaps out two colliding particles' x and y velocities after running through
 * an elastic collision reaction equation
 *
 * @param  Object | particle      | A particle object with x and y coordinates, plus velocity
 * @param  Object | otherParticle | A particle object with x and y coordinates, plus velocity
 * @return Null | Does not return a value
 */

function resolveCollision(particle, otherParticle) {
    const xVelocityDiff = particle.velocity.x - otherParticle.velocity.x;
    const yVelocityDiff = particle.velocity.y - otherParticle.velocity.y;

    const xDist = otherParticle.x - particle.x;
    const yDist = otherParticle.y - particle.y;

    // Prevent accidental overlap of particles
    if (xVelocityDiff * xDist + yVelocityDiff * yDist >= 0) {

        // Grab angle between the two colliding particles
        const angle = -Math.atan2(otherParticle.y - particle.y, otherParticle.x - particle.x);

        // Store mass in var for better readability in collision equation
        const m1 = particle.mass;
        const m2 = otherParticle.mass;

        // Velocity before equation
        const u1 = rotate(particle.velocity, angle);
        const u2 = rotate(otherParticle.velocity, angle);

        // Velocity after 1d collision equation
        const v1 = { x: u1.x * (m1 - m2) / (m1 + m2) + u2.x * 2 * m2 / (m1 + m2), y: u1.y };
        const v2 = { x: u2.x * (m1 - m2) / (m1 + m2) + u1.x * 2 * m2 / (m1 + m2), y: u2.y };

        // Final velocity after rotating axis back to original location
        const vFinal1 = rotate(v1, -angle);
        const vFinal2 = rotate(v2, -angle);

        // Swap particle velocities for realistic bounce effect
        particle.velocity.x = vFinal1.x;
        particle.velocity.y = vFinal1.y;

        otherParticle.velocity.x = vFinal2.x;
        otherParticle.velocity.y = vFinal2.y;
    }
}

function Particle(x, y, radius, color){
	this.x = x;
	this.y = y;
	this.velocity = {
		x: (Math.random() - 0.5) * 5,
		y: (Math.random() - 0.5) * 5
	}
	this.radius = radius;
	this.color = color;
	this.mass = 1;
	this.opacity = 0;

	this.update = function(particles){
		this.draw();

		for(let i = 0; i < particles.length; i++){
			// Ignorer la particule si elle est égale à elle-même
			if(this === particles[i]){
				continue;
			}

			// Les particules se touchent
			if(distance(this.x, this.y, particles[i].x, particles[i].y) - this.radius * 2 < 0){
				resolveCollision(this, particles[i]);
			}
		}

		// Si les particles touchent les côtés verticaux
		if(this.x - this.radius <= 0 || this.x + this.radius >= innerWidth){
			this.velocity.x = -this.velocity.x;
		}
		// Si les particules touchent les côtés horizontaux
		if(this.y - this.radius <= 0 || this.y + this.radius >= innerHeight){
			this.velocity.y = -this.velocity.y;
		}

		// Collision de souris
		if(distance(mouse.x, mouse.y, this.x, this.y) < 120 && this.opacity < 0.4){
			this.opacity += 0.02;
		} else if (this.opacity > 0) {
			this.opacity -= 0.02;
			this.opacity = Math.max(0, this.opacity);
		}

		// Mouvement de particule
		this.x += this.velocity.x;
		this.y += this.velocity.y;
	};

	this.draw = function(){
		c.beginPath();
		c.arc(this.x, this.y, this.radius, 0, Math.PI*2, false);
		c.save();
		c.globalAlpha = this.opacity;
		c.fillStyle = this.color;
		c.fill();
		c.restore();
		c.strokeStyle = this.color;
		c.stroke();
		c.closePath();
	};
}

let particles;

function init(){
	particles = [];

	for (let i = 0; i < 200; i++){
		const radius = 15;
		let x = randomIntFromRange(radius, innerWidth - radius);
		let y = randomIntFromRange(radius, innerHeight - radius);
		const color = randomColor(colors);

		if(i !== 0){
			for(let j = 0; j < particles.length; j++) {
				if(distance(x, y, particles[j].x, particles[j].y) - radius * 2 < 0){
					x = randomIntFromRange(radius, innerWidth - radius);
					y = randomIntFromRange(radius, innerHeight - radius);

					j = -1;	
				}
			}
		}

		particles.push(new Particle(x, y, radius, color));
	}
}

// Fonction appelée à répétition permettant l'animation du canvas (Toutes les millisecondes)
function animate() {
	// On boucle l'animation afin qu'elle ne s'arrête jamais
	requestAnimationFrame(animate);

	c.clearRect(0, 0, innerWidth, innerHeight);

	particles.forEach(function(particle) {
		particle.update(particles);
	});
}

init();
animate();