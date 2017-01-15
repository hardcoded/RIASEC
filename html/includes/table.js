//Les boutons Precedent et Suivant sont associés au fonction nextgroupe() et prevgroupe() directement dans le fichier html
//Pour un groupe de question donné, on peut obtenir les reponses données comme suit :
//          cpt compris entre 0 et 2, groupe compris entre 1 et 12
//          degree de la reponse (1,2 ou 3) = checkboxList[groupe][cpt].className[checkboxList[groupe][cpt].className.length - 1]
//          lettre de la question choisie (a,b,c,d,e ou f) = checkboxList[groupe][cpt].id



checkedBox = 0; //Nombre totale de cases cocher
oneChecked = 0; //Nombre de 1 cocher
twoChecked = 0; //Nombre de 2 cocher
threeChecked = 0; //Nombre de 3 cocher

var checkboxList = []; //Liste des cases cocher. sous la forme [ ["cases du groupe 1"], ["cases du groupe 2"], .... ]

current = 0; // Groupe de question courant
first = true

function checkForAnswer(){ // Renvoi true si des reponses on deja etait enregistrer pour le groupe de question courant
  return checkboxList[current] != undefined
}

function checkBoxes(){ //Fonction qui check les box comprises dans la liste de box cocher et initialise les compteurs
  for (var i = 0; i < checkboxList[current].length; i++) {
    checkboxList[current][i].checked = true
  }
  oneChecked = 1;
  twoChecked = 1;
  threeChecked = 1;
  checkedBox = 3;
}

function unCheckAll(){ // Decoche toutes les cases
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

function saveCheckbox(){ // Sauvegarde les cases cocher dans une liste
  d = document.getElementsByName("checkbox") // recupere toutes les cases
  var answer = []
  for (var i = 0; i < d.length; i++) { //Regarde pour toutes les cases
    if(d[i].checked){ // Si la cases est cocher on l'ajoute au tableau de cases cocher
      answer.push(d[i])
    }
  }
  if(checkForAnswer()){
    checkboxList[current] = answer
  }
  else{
    checkboxList.push(answer) // Ajout du tableaux de reponse dans la liste de reponse
  }
}

function nextGroupe(){ // Changement du groupe de question
  if(current == 12 && checkedBox == 3){ // Si on en etait au dernier groupe de question on affiche les stats !!!!! La condition "!(checkedBox == 3)" doit etre inversée, c'est juste pour debugger simplement
    saveCheckbox();
    result = Algorithme();
    window.location = "?section=resultats&r="+ result[0]+"&i=" + result[1]+"&a=" + result[2]+"&s=" + result[3]+"&e=" + result[4]+"&c=" + result[5];
    ajax({
      url: 'controleur/c_resultats.php',
      data: 'r='+ result[0]+'&i=' + result[1]+'&a=' + result[2]+'&s=' + result[3]+'&e=' + result[4]+'&c=' + result[5],
      success: function(reponse) {
        alert(reponse); // reponse contient l'affichage du fichier PHP (soit echo)
      }
    });
  }
  else{
    if(checkedBox == 3 || first){ // Les 3 cases sont cocher (le code correspond pas c'est pour debugger plus simplement) ou que c'est la premiere fois on passe au prochain
	document.getElementById("stat").hidden = true
      saveCheckbox(); // On sauvegarde les cases cocher
      unCheckAll(); // On decoche tout
      next_fs = document.getElementById("progress"+(current+1)); // Avancement de la timeline
      listQuestion = document.getElementsByName("label") // Recupere la zone de texte des question
      for (var i = 0; i < listQuestion.length; i++) {
        listQuestion[i].innerHTML = question[current+1][i] //Change le contenu de toutes les question a partir des données dans le fichier question.js (a changer par la bdd plus tard)
      }
      next_fs.className = "active"
      if(document.getElementsByName("prev")[0].hidden && current != 0){ // Si le bouton precedent est cacher et que l'on ai plus au premier, on l'affiche
        document.getElementsByName("prev")[0].hidden = false //Affiche le bouton (on le decache)
      }
      console.log(current);
      if(current == 11){ // Si on etait a l'avant dernier on change le texte du bouton en Fin pour la coherence
        document.getElementsByName("next")[0].value = "Fin"
      }
      current++ // On increment le groupe courant
      first = false // On est plus au premier
      if(checkForAnswer()){ // On regarde si on avait deja donné des reponses pour ce groupe
        checkBoxes() // On recoche les cases que l'utilisateur avait deja cocher
      }
    }
  }
}

function prevGroupe(){ // Passe au groupe precedent
if(!document.getElementsByName("prev")[0].hidden && current == 2){ // Si on passe au premier on cache le bouton precedent
	document.getElementsByName("prev")[0].hidden = true
}
  unCheckAll(); // On decoche tout
  current_fs = document.getElementById("progress"+current); // Timeline
  listQuestion = document.getElementsByName("label") //recup zone question
  for (var i = 0; i < listQuestion.length; i++) {
    listQuestion[i].innerHTML = question["groupe"+(current-1)][i] //Change le texte des question
  }
  current_fs.className = ""
  current-- // On decrement le groupe courant
  if(checkForAnswer()){ //Regarde si il y avait deja des reponses donne
    checkBoxes() // Coses les cases correspondante au reponse donne
  }
}


window.onload = function() // Une fois que le document a charger, on execute le code en dessous
{
  d1 = document.getElementsByClassName("checkbox1"); //On recupere toutes les cases de degres 1
  d2 = document.getElementsByClassName("checkbox2");//On recupere toutes les cases de degres 2
  d3 = document.getElementsByClassName("checkbox3");//On recupere toutes les cases de degres 3

  d1 = Array.prototype.slice.call(d1); // On change la liste donne plus haut pas un tableau
  d2 = Array.prototype.slice.call(d2);
  d3 = Array.prototype.slice.call(d3);


  for (var i = 0; i < d1.length; i++) { // On ajoute un clicklistener au toutes les cases
    d1[i].addEventListener('click', Handler);
    d2[i].addEventListener('click', Handler);
    d3[i].addEventListener('click', Handler);
  }

  function Handler(event){ // La fonction appeler des qu'on clique sur une case

    if (event.currentTarget.checked && checkedBox == 3) { // Si la case et cocher et qu'il y a deja 3 case de cocher, on la decoche
      event.currentTarget.checked = false;
    }
    else{
      if( (tmp = d1.indexOf(event.currentTarget)) != -1){ // Si la case cocher des une case de degres 1
        if(!event.currentTarget.checked){ // Si elle n'est plus cocher
          checkedBox--; // On decrement le nombre de cases totale
          oneChecked--; // On decrement le nombre de cases de degres 1
        }
        else{
          if(oneChecked == 1 || d2[tmp].checked || d3[tmp].checked){ // Si elle est cocher maintenant et que soit une case de degres 1 est deja cocher, soit une case de degres 2 ou 3 sur la meme ligne est cocher
            event.currentTarget.checked = false; // On decoche
          }
          else{ // Sinon on la cochai et la on actualise les compteurs
            checkedBox++;
            oneChecked++;
          }
        }
      }
      // On repete les meme conditions selon si c'est une case de degres 2 ou 3
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

  nextGroupe(); // On lance le questionnaire en lancant premier groupe de question
}

function degre(x,y){
  return checkboxList[x][y].className[checkboxList[x][y].className.length - 1];
}
function id(x,y){
  return checkboxList[x][y].id;
}

function Algorithme(){
  var score = [0,0,0,0,0,0];
  var rea = ["a","d","f","a","f","b","f","b","c","f","b","d"];
  var inv = ["b","e","e","f","d","a","c","a","b","d","e","e"];
  var art = ["c","f","b","b","a","f","b","e","e","e","f","f"];
  var soc = ["d","a","a","e","c","d","e","c","a","c","a","c"];
  var ent = ["e","c","d","d","b","e","a","d","d","a","d","b"];
  var con = ["f","b","c","c","e","c","d","f","f","b","c","a"];

  var reponse = [rea,inv,art,soc,ent,con];
  for (var i=1;i < checkboxList.length ;i++){
    for(var j=0; j<3; j++){
      var z = 0;
      var trouve = false;
      while(z < reponse.length & !trouve){
        if(reponse[z][i-1] == ("" + id(i,j))){
          score[z] += 4 - degre(i,j);
          trouve = true;
        }
        z++;
      }
    }
  }
  for(i=0; i< score.length;i++){
    score[i]= Math.round((score[i]/72)*100);
  }
  return score;
  }
