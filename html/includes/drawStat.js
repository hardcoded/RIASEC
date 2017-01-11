var barCanvas = document.getElementById('bar');
    if(!barCanvas)
    {
        alert("Impossible de récupérer le canvas");
    }

var barContext = barCanvas.getContext('2d');
    if(!barContext)
    {
        alert("Impossible de récupérer le context du canvas");
    }


var hexagoneCanvas = document.getElementById('hexagone');
    if(!hexagoneCanvas)
    {
        alert("Impossible de récupérer le canvas");
    }

var hexagoneContext = hexagoneCanvas.getContext('2d');
    if(!barContext)
    {
        alert("Impossible de récupérer le context du canvas");
    }

var elem = document.getElementById('stat');
window.mySwipe = Swipe(elem, {});

currentSlide = 0
drawnedHexagone = false;
drawnedBar = false;

rPerc = Math.random();
iPerc = Math.random();
aPerc = Math.random();
sPerc = Math.random();
ePerc = Math.random();
cPerc = Math.random();


function change(){
  /*if(!drawnedHexagone && currentSlide == 0){
    animateHexagone(25,25, 450,450,rPerc,iPerc,aPerc,sPerc,ePerc,cPerc,2000);
    drawnedHexagone = true;
  }
  if(!drawnedBar && currentSlide == 1){
    drawBarStat(50,50, 400,400,rPerc,iPerc,aPerc,sPerc,ePerc,cPerc,2000);
    drawnedBar = true;
  }*/
  if(currentSlide == 1){
    mySwipe.prev()
    currentSlide--
  }
  else{
    mySwipe.next();
    currentSlide++
  }
}
