function drawBar(x,y,width,height,percentage,direction,color){

  if(direction == -1){
       originRectX = x ;
     }
  else{
    originRectX = x + width;
   }

  diameter = height / 2;

  bigCircleX = originRectX + width * percentage * direction;
  bigCircleY = y + height / 2;

  smallCircleX = originRectX + width * percentage * direction;
  smallCircleY = y + height / 2;
  smallCircleDiameter = diameter / 1.1;

  text = (percentage * 100).toFixed(0) +"%";

  sizeFont = smallCircleDiameter * 0.6;

  barContext.beginPath();//On démarre un nouveau tracé
  barContext.fillStyle = color; //Toutes les prochaines formes pleines seront rouges.
  barContext.moveTo(originRectX, y);//On se déplace au coin inférieur gauche
  barContext.lineTo(originRectX + (width * percentage * direction) , y );
  barContext.lineTo(originRectX + (width * percentage * direction), height + y);
  barContext.lineTo(originRectX, height + y);
  barContext.lineTo(originRectX, y );
  barContext.fill();//On trace seulement les lignes.
  barContext.closePath();

  barContext.beginPath();
  barContext.arc(bigCircleX, bigCircleY, diameter, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  barContext.fill();
  barContext.closePath();

  barContext.beginPath();
  barContext.fillStyle = "#ffffff"; //Toutes les prochaines formes pleines seront rouges.
  barContext.arc(smallCircleX, smallCircleY, smallCircleDiameter , 0, Math.PI*2); //On trace la courbe délimitant notre forme
  barContext.fill();
  barContext.closePath();

  barContext.beginPath();
  barContext.fillStyle = "#ff0000"; //Toutes les prochaines formes pleines seront rouges.
  barContext.font= sizeFont + "px Arial";
  barContext.fillText(text,smallCircleX - text.length / 2 * sizeFont / 2, smallCircleY + sizeFont / 2);//strokeText(); fonctionne aussi, vous vous en doutez.
  barContext.fill();
  barContext.closePath();

}

function animateBar(x,y,width,height,percentage,animationTime,direction){

  var start = null;

  function step(timestamp) {
    barContext.clearRect(x,y, width, height);
    var progress;
    if (start === null) start = timestamp;
    progress = timestamp - start;

    scale = progress / animationTime;


    drawBar(x,y,width,height,1,direction,"#C0C0C0");
    drawBar(x,y,width,height,percentage * scale,direction,"#ff0000");
        drawRectangleBar(x,y,width,height);

    if (progress < animationTime) {
      requestAnimationFrame(step);
    }
  }

  requestAnimationFrame(step);
}

function drawRectangleBar(x, y, width, height){
  barContext.beginPath();//On démarre un nouveau tracé
  barContext.moveTo(x,y);//On se déplace au coin inférieur gauche
  barContext.lineTo(x + width, y );
  barContext.lineTo(x + width, height + y);
  barContext.lineTo(x, height + y);
  barContext.lineTo(x, y );
  barContext.moveTo(x,y);//On se déplace au coin inférieur gauche
  barContext.stroke();//On trace seulement les lignes.
  barContext.closePath();
}

function drawBarStat(x, y, width, height, rPerc, iPerc, aPerc, sPerc, ePerc,  cPerc, animationTime){
  animateBar(x ,y + (height / 6 * 0) ,width / 2,height / 6,rPerc,animationTime,1);
  animateBar(x + width / 2,y + (height / 6 * 1),width / 2,height / 6,iPerc,animationTime,-1);
  animateBar(x,y + (height / 6 * 2),width / 2,height / 6,aPerc,animationTime,1);
  animateBar(x + width / 2,y + (height / 6 * 3),width / 2,height / 6,sPerc,animationTime,-1);
  animateBar(x,y + (height / 6 * 4),width / 2,height / 6,ePerc,animationTime,1);
  animateBar(x + width / 2,y + (height / 6 * 5),width / 2,height / 6,cPerc,animationTime,-1);
}
