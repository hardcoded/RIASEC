// Affiche un message avec le profil calculé de l'utilisateur.

var profils=["réaliste","investigatif","artistique","social","entrepreneur","conventionnel"];
score= Algorithme();

function Profil(score){
	var max = score[0];
	int j = 0;
	for (var i=0; i<score.length-1; i++){
		if score[i+1]>max{
			max = score[i+1];
			j=i+1;
		} 
	}
	alert("D'après vos réponses au questionnaire RIASEC, Vous avez un profil de type"+profils[j]);
	return 0;
	};