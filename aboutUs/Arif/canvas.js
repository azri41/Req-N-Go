var pattern= new Image();

 function animate(){
 pattern.src = 'ariff.jpg';
 setInterval(drawShape, 100);
 }

 function drawShape(){
 // get the canvas element using the DOM
 var canvas = document.getElementById('mycanvas');

 // Make sure we don't execute when canvas isn't supported
 if (canvas.getContext){

 // use getContext to use the canvas for drawing
 var ctx = canvas.getContext('2d');

 ctx.fillStyle = 'rgba(0,0,0,0.4)';
 ctx.strokeStyle = 'rgba(0,153,255,0.4)';
 ctx.save();
 ctx.translate(150,150);

 var time = new Date();
 ctx.rotate( ((2*Math.PI)/6)*time.getSeconds() + (
(2*Math.PI)/6000)*time.getMilliseconds() );
 ctx.translate(0,28.5);
 ctx.drawImage(pattern,-3.5,-3.5);
 ctx.restore();
 }

 else {
 alert('You need Safari or Firefox 1.5+ to see this demo.');
 }
 }
