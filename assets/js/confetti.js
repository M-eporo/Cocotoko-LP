// let confetti = [];
// let dt = 0;
// function setup() {
//     createCanvas(window.innerWidth, innerHeight);
//     colorMode(HSB);
//     angleMode(DEGREES);
//     rectMode(CENTER);
//     for(let i = 0; i < 100; i++) {
//         confetti.push(new Confetti());
//     }
// };
// function draw() {
//     background(255);
//     dt += deltaTime / 1000;
//     for(const c of confetti) {
//         c.update(dt);
//         c.display();
//     }
// }
// let d = 0;
// class Confetti {
//     constructor() {
//         this.w =  random(10, 15);
//         this.h = random(10, 15);
//         this.x = 0;
//         this.y = random(-height, 0);
//         this.color = color(random(0, 360), 100, 100);
//         this.radius = sqrt(random(pow(width / 2, 2)));
//         this.initAngle = random(0, 360);
//         this.rot = random(0, 1080);
//         this.rotSpeed = random(-1, 1);
//     }
//     update(t) {
//         let angleSpeed = 35;
//         let theta = this.initAngle + angleSpeed * t;
//         this.x = width / 2 + this.radius * sin(theta);
//         this.y += 3;
//         this.rot = this.rotSpeed * t;
//         if(this.y > height + this.h) {
//             this.y = 0 - this.h;
//         }  
//     }
//     display() {
//         push();
//         noStroke();
//         fill(this.color);
//         translate(this.x, this.y);
//         rotate(d);
//         rect(0, 0, this.w, this.h);
//         d += 0.001
//         pop()
//     }
// }