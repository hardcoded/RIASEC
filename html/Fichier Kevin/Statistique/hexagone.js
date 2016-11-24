function drawRectangle(x, y, width, height, rMax, iMax, aMax, sMax, eMax, cMax, centerX, centerY){
  hexagoneContext.beginPath();//On démarre un nouveau tracé
  hexagoneContext.moveTo(x,y);//On se déplace au coin inférieur gauche
  hexagoneContext.lineTo(x + width, y );
  hexagoneContext.lineTo(x + width, height + y);
  hexagoneContext.lineTo(x, height + y);
  hexagoneContext.lineTo(x, y );
  hexagoneContext.moveTo(x,y);//On se déplace au coin inférieur gauche
  hexagoneContext.stroke();//On trace seulement les lignes.
  hexagoneContext.closePath();

  hexagoneContext.fillStyle = "#ff0000"; //Toutes les prochaines formes pleines seront rouges.
  hexagoneContext.beginPath(); //On démarre un nouveau tracé.

  hexagoneContext.arc(rMax[0], rMax[1], 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  hexagoneContext.closePath();
  hexagoneContext.arc(iMax[0], iMax[1], 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  hexagoneContext.closePath();
  hexagoneContext.arc(aMax[0], aMax[1], 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  hexagoneContext.closePath();
  hexagoneContext.arc(sMax[0], sMax[1], 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  hexagoneContext.closePath();
  hexagoneContext.arc(eMax[0], eMax[1], 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  hexagoneContext.closePath();
  hexagoneContext.arc(cMax[0], cMax[1], 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  hexagoneContext.closePath();
  hexagoneContext.arc(centerX, centerY, 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
  hexagoneContext.closePath();

  hexagoneContext.col
  hexagoneContext.fill(); //On utilise la méthode fill(); si l'on veut une forme pleine
  hexagoneContext.closePath();
}

function drawHexagone(x, y, width, height, rPerc, iPerc, aPerc, sPerc, ePerc,  cPerc,rMax, iMax, aMax, sMax, eMax, cMax, centerX, centerY){

      var distanceXR = centerX - rMax[0]; var distanceYR = centerY - rMax[1];
      var distanceXI = iMax[0] - centerX; var distanceYI = centerY - iMax[1];
      var distanceXA = aMax[0] - centerX; var distanceYA = 0;
      var distanceXS = sMax[0] - centerX; var distanceYS = sMax[1] - centerY;
      var distanceXE = centerX - eMax[0]; var distanceYE = eMax[1] - centerY;
      var distanceXC = centerX - cMax[0]; var distanceYC = 0;

      var angleR = Math.atan(distanceYR / distanceXR);
      var angleI = Math.atan(distanceYI / distanceXI);
      var angleA = Math.atan(distanceYA / distanceXA);
      var angleS = Math.atan(distanceYS / distanceXS);
      var angleE = Math.atan(distanceYE / distanceXE);
      var angleC = Math.atan(distanceYC / distanceXC);

      var posR = getPosition(rPerc, distanceXR,angleR)
      var posI = getPosition(iPerc, distanceXI,angleI)
      var posA = getPosition(aPerc, distanceXA,angleA)
      var posS = getPosition(sPerc, distanceXS,angleS)
      var posE = getPosition(ePerc, distanceXE,angleE)
      var posC = getPosition(cPerc, distanceXC,angleC)

      console.log(posR);
      console.log(posI);
      console.log(posA);
      console.log(posS);
      console.log(posE);
      console.log(posC);

      hexagoneContext.beginPath();
      hexagoneContext.strokeStyle = "#ff0000"; //Toutes les prochaines formes pleines seront rouges.
      hexagoneContext.moveTo(centerX - posR[0], centerY - posR[1]);//On se déplace au coin inférieur gauche
      hexagoneContext.lineTo(centerX + posI[0], centerY - posI[1]);
      hexagoneContext.lineTo(centerX + posA[0], centerY);
      hexagoneContext.lineTo(centerX + posS[0], posS[1] + centerY );
      hexagoneContext.lineTo(centerX - posE[0], posE[1] + centerY);
      hexagoneContext.lineTo(centerX - posC[0], centerY );
      hexagoneContext.lineTo(centerX - posR[0], centerY - posR[1]);

      hexagoneContext.stroke(); //On utilise la méthode fill(); si l'on veut une forme pleine
      hexagoneContext.closePath();

      hexagoneContext.font = "10px Helvetica";//On passe à l'attribut "font" de l'objet hexagoneContext une simple chaîne de caractères composé de la taille de la police, puis de son nom.

      offsetX = width / 300 * 10;
      offsetY = width / 300 * 10;
      hexagoneContext.beginPath();
      hexagoneContext.fillText(Math.round(iPerc * 100).toFixed(2) +"%",centerX + posI[0] + offsetX,  centerY - posI[1]);//strokeText(); fonctionne aussi, vous vous en doutez.
      hexagoneContext.fillText(Math.round(aPerc * 100).toFixed(2)  +"%",centerX + posA[0] + offsetX,   centerY );//strokeText(); fonctionne aussi, vous vous en doutez.
      hexagoneContext.fillText(Math.round(sPerc * 100).toFixed(2)  +"%",centerX + posS[0] + offsetX,  posS[1] + centerY + offsetY);//strokeText(); fonctionne aussi, vous vous en doutez.
      hexagoneContext.fillText(Math.round(ePerc * 100).toFixed(2)  +"%",centerX - posE[0] + offsetX, posE[1] + centerY + offsetY);//strokeText(); fonctionne aussi, vous vous en doutez.
      hexagoneContext.fillText(Math.round(cPerc * 100).toFixed(2) +"%",centerX - posC[0] - offsetX, centerY + offsetY);//strokeText(); fonctionne aussi, vous vous en doutez.
      hexagoneContext.fillText(Math.round(rPerc * 100).toFixed(2)  +"%",centerX - posR[0] + offsetX, centerY - posR[1] - offsetY / 2);//strokeText(); fonctionne aussi, vous vous en doutez.
      hexagoneContext.closePath();

      hexagoneContext.beginPath();
      hexagoneContext.fillStyle = "#ff0000"; //Toutes les prochaines formes pleines seront rouges.
      hexagoneContext.arc(centerX - posR[0] , centerY - posR[1], 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
      hexagoneContext.closePath();
      hexagoneContext.arc(centerX + posI[0], centerY - posI[1] , 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
      hexagoneContext.closePath();
      hexagoneContext.arc(centerX + posA[0], centerY, 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
      hexagoneContext.closePath();
      hexagoneContext.arc(centerX + posS[0], posS[1] + centerY, 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
      hexagoneContext.closePath();
      hexagoneContext.arc(centerX - posE[0], posE[1] + centerY, 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
      hexagoneContext.closePath();
      hexagoneContext.arc(centerX - posC[0], centerY, 2, 0, Math.PI*2); //On trace la courbe délimitant notre forme
      hexagoneContext.closePath();

      hexagoneContext.fill(); //On utilise la méthode fill(); si l'on veut une forme pleine
      hexagoneContext.closePath();

}

function animateHexagone(x, y, width, height, rPerc, iPerc, aPerc, sPerc, ePerc,  cPerc, animationTime){

  var centerX = width / 2 + x;
  var centerY =  height / 2 + y;

  var rMax = [x + width / 4, y];
  var iMax = [x + width * 3 / 4, y];
  var aMax = [x + width, centerY];
  var sMax = [x + width * 3 / 4, y + height];
  var eMax = [x + width / 4, y + height];
  var cMax = [x, centerY];


  var start = null;

  function step(timestamp) {
    hexagoneContext.clearRect(x,y, hexagoneCanvas.width, hexagoneCanvas.height);
    var progress;
    if (start === null) start = timestamp;
    progress = timestamp - start;

    scale = progress / animationTime;

    drawRectangle(x,y,width,height,rMax, iMax, aMax, sMax, eMax, cMax, centerX, centerY)
    drawHexagone(x,y,width,height,rPerc * scale,iPerc * scale,aPerc * scale,sPerc * scale,ePerc * scale,cPerc * scale,rMax, iMax, aMax, sMax, eMax, cMax, centerX, centerY)

    if (progress < animationTime) {
      requestAnimationFrame(step);
    }
  }

  requestAnimationFrame(step);
}

function getPosition(pourcentage, distance, angle){
  var distanceRelative = distance * pourcentage;
  var distanceOppose = Math.tan(angle) * distanceRelative;
  return [distanceRelative, distanceOppose];
}
