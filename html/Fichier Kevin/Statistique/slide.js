function change(){
  if(!drawned){
    rPerc = Math.random();
    iPerc = Math.random();
    aPerc = Math.random();
    sPerc = Math.random();
    ePerc = Math.random();
    cPerc = Math.random();

    animateHexagone(25,25, 450,450,rPerc,iPerc,aPerc,sPerc,ePerc,cPerc,2000);
    drawned = true;
  }
  if(current == 1){
    mySwipe.prev()
    current--
  }
  else{
    mySwipe.next();
    current++
  }
}


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


current = 0
drawned = false;

rPerc = Math.random();
iPerc = Math.random();
aPerc = Math.random();
sPerc = Math.random();
ePerc = Math.random();
cPerc = Math.random();


drawBarStat(50,25, 400,450,rPerc,iPerc,aPerc,sPerc,ePerc,cPerc,2000);


// pure JS
var elem = document.getElementById('mySwipe');
window.mySwipe = Swipe(elem, {
  // startSlide: 4,
  // auto: 3000,
  // continuous: true,
  // disableScroll: true,
  // stopPropagation: true,
  // callback: function(index, element) {},
  // transitionEnd: function(index, element) {}
});
// with jQuery
// window.mySwipe = $('#mySwipe').Swipe().data('Swipe');
