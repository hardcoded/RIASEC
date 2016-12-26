window.onload = function()
{
  d1 = document.getElementsByClassName("checkbox1");
  d2 = document.getElementsByClassName("checkbox2");
  d3 = document.getElementsByClassName("checkbox3");

  d1 = Array.prototype.slice.call(d1);
  d2 = Array.prototype.slice.call(d2);
  d3 = Array.prototype.slice.call(d3);

  checkedBox = 0;
  oneChecked = 0;
  twoChecked = 0;
  threeChecked = 0;


  for (var i = 0; i < d1.length; i++) {
    d1[i].addEventListener('click', Handler);
    d2[i].addEventListener('click', Handler);
    d3[i].addEventListener('click', Handler);
  }

  function Handler(){
    console.log(checkedBox + " " + oneChecked + " " + twoChecked + " " + threeChecked + " ")

    if (event.currentTarget.checked && checkedBox == 3) {
      event.currentTarget.checked = false;
    }
    else{
      if( (tmp = d1.indexOf(event.currentTarget)) != -1){
        if(!event.currentTarget.checked){
          checkedBox--;
          oneChecked--;
        }
        else{
          if(oneChecked == 1 || d2[tmp].checked || d3[tmp].checked){
            event.currentTarget.checked = false;
          }
          else{
            checkedBox++;
            oneChecked++;
          }
        }
      }
      else if( (tmp = d2.indexOf(event.currentTarget)) != -1){
        if(!event.currentTarget.checked){
          checkedBox--;
          twoChecked--;
        }
        else{
          if(twoChecked == 1 || d1[tmp].checked || d3[tmp].checked){
            event.currentTarget.checked = false;
          }
          else{
            checkedBox++;
            twoChecked++;
          }
        }
      }
      else{
        tmp = d3.indexOf(event.currentTarget);
        if(!event.currentTarget.checked){
          checkedBox--;
          threeChecked--;
        }
        else{
          if(threeChecked == 1 || d1[tmp].checked || d2[tmp].checked){
            event.currentTarget.checked = false;
          }
          else{
            checkedBox++;
            threeChecked++;
          }
        }
      }
    }
  }
}
