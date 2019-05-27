<?php
    echo "<script type='text/javascript'>
    function chartLine(){
      var ctx = document.getElementById('chartLine').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',
  
          // The data for our dataset
          data: {
              labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre'],
              datasets: [{
                  label: 'Ventes de l\'année',
                  backgroundColor: 'rgb(100, 200, 250)',
                  borderColor: 'rgb(30, 150, 210)',
                  data: [".$chartValues[1].", ".$chartValues[2].", ".$chartValues[3].",
                  ".$chartValues[4].", ".$chartValues[5].", ".$chartValues[6].",
                  ".$chartValues[7].", ".$chartValues[8].", ".$chartValues[9].",
                  ".$chartValues[10].", ".$chartValues[11].", ".$chartValues[12]."]
              }]
          },
  
          // Configuration options go here
          options: {}
      });
  }
    function chartPie(){
          ctx = document.getElementById('chartPie').getContext('2d');
          chart = new Chart(ctx, {
          type: 'pie',
          data: {
              datasets: [{
                  label: 'Produits',
                  data: [".$best[0]['nombre'].", ".$best[1]['nombre'].", ".$best[2]['nombre']."],
                  backgroundColor: ['#0074D9', '#FF4136', '#2ECC40']
              }],
              labels: ['".$best[0]['name']."','".$best[1]['name']."','".$best[2]['name']."']
          },
          options: {
              responsive: true,
              title:{
                  display: true,
                  text: 'Meilleures ventes'
              }
          }
          });
    }
  
  $(document).ready(function () {
      chartLine();
      chartPie();
  });
    </script>
    <div class='chartContainer'><canvas id='chartLine'></canvas></div>
    <div class='chartContainer'><canvas id='chartPie'></canvas></div>";
?>