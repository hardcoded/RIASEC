function drawHexagone(score){
	var ctx = document.getElementById("hexagone");

		var data = {
		        labels: ["Réaliste", "Investigatif", "Artistique", "Social", "Entrepreneur", "Conventionnel"],
		        datasets: [{
		            label: 'Mes Résultats',
		            backgroundColor: "rgba(255, 0, 0, 0.2)",
		            borderColor: "rgba(255, 0, 0, 0.6)",
		            pointBackgroundColor: "rgba(255, 0, 0, 0.6)",
		            pointBorderColor: "#fff",
		            pointHoverBackgroundColor: "#fff",
		            pointHoverBorderColor: "rgba(255, 0, 0, 0.6)",
		            data: score,
		        }/*,
		        	{
		            label: "Résultats Promo",
		            backgroundColor: "rgba(255,99,132,0.2)",
		            borderColor: "rgba(255,99,132,1)",
		            pointBackgroundColor: "rgba(255,99,132,1)",
		            pointBorderColor: "#fff",
		            pointHoverBackgroundColor: "#fff",
		            pointHoverBorderColor: "rgba(255,99,132,1)",
		            data: [28, 48, 40, 19, 96, 27],// à récupérer dans base de donnée
		        }*/]
		};



		var myRadarChart = new Chart(ctx, {
		    type: 'radar',
		    data : data,
		    options: {
		        scale: {
							angleLines:{
								display: true,
								color: "rgba(192,192,192,0.2)",
								lineWidth: 1,
							},
							pointLabels:{
								fontSize: 12,
								fontColor: "rgba(192,192,192,0.2)",
								fontFamiliy: 'Helvetica',
							},
		          reverse: false,
		          ticks: {
		          	beginAtZero: true,
								max: 50,
								stepSize: 10,
		        	}
		        }
			}
	});
}
