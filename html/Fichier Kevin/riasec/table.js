checkedBox = 0;
oneChecked = 0;
twoChecked = 0;
threeChecked = 0;

var checkboxList = [];

current = 0;
first = true

function checkForAnswer(){
  return checkboxList[current] != undefined
}

function checkBoxes(){
  for (var i = 0; i < checkboxList[current].length; i++) {
    checkboxList[current][i].checked = true
  }
  oneChecked = 1;
  twoChecked = 1;
  threeChecked = 1;
  checkedBox = 3;
}

function unCheckAll(){
  d = document.getElementsByName("checkbox")
  for (var i = 0; i < d.length; i++) {
    if(d[i].checked){
      d[i].checked = false;
    }
  }
  oneChecked = 0;
  twoChecked = 0;
  threeChecked = 0;
  checkedBox = 0;
}

function saveCheckbox(){
  d = document.getElementsByName("checkbox")
  var answer = []
  for (var i = 0; i < d.length; i++) {
    if(d[i].checked){
      answer.push(d[i])
    }
  }
  if(checkForAnswer()){
    checkboxList[current] = answer
  }
  else{
    checkboxList.push(answer)
  }
}

function nextGroupe(){
  if(current == 12){
    //window.location = "http://teabreak.fr/riasec/Statistique/index.html";
    document.getElementById("msform").hidden = true
    document.getElementById("stat").hidden = false
    change()
  }
  else{
    if(checkedBox == 3 || first){
      saveCheckbox();
      unCheckAll();
      next_fs = document.getElementById("progress"+(current+1));
      listQuestion = document.getElementsByName("label")
      for (var i = 0; i < listQuestion.length; i++) {
        listQuestion[i].innerHTML = question["groupe"+(current+1)][i]
      }
      next_fs.className = "active"
      if(document.getElementsByName("prev")[0].hidden && current != 0){
        document.getElementsByName("prev")[0].hidden = false
      }
      console.log(current);
      if(current == 11){
        document.getElementsByName("next")[0].value = "Fin"
      }
      current++
      first = false
      if(checkForAnswer()){
        checkBoxes()
      }
    }
  }
}

function prevGroupe(){
  unCheckAll();
  current_fs = document.getElementById("progress"+current);
  listQuestion = document.getElementsByName("label")
  for (var i = 0; i < listQuestion.length; i++) {
    listQuestion[i].innerHTML = question["groupe"+(current-1)][i]
  }
  current_fs.className = ""
  current--
  if(checkForAnswer()){
    checkBoxes()
  }
}


window.onload = function()
{
  d1 = document.getElementsByClassName("checkbox1");
  d2 = document.getElementsByClassName("checkbox2");
  d3 = document.getElementsByClassName("checkbox3");

  d1 = Array.prototype.slice.call(d1);
  d2 = Array.prototype.slice.call(d2);
  d3 = Array.prototype.slice.call(d3);


  for (var i = 0; i < d1.length; i++) {
    d1[i].addEventListener('click', Handler);
    d2[i].addEventListener('click', Handler);
    d3[i].addEventListener('click', Handler);
  }

  function Handler(){

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

  nextGroupe();
}
