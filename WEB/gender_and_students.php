<?php
 $con = mysqli_connect('localhost','root','mysql123','pc');
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
         <?php 
 $query = "SELECT gen ,count(*) as genc FROM gender group by gen  ";
 

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['gen']."',".$row['genc']."],";
 }
 ?>
 ]);

        // Set options for Sarah's pie chart.
        var options = {title:'The percentage of male and female students placed from the year 2011 to 2015',
                       width:600,
                       height:700};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');

        data.addRows([
          <?php 
 $query = "SELECT status,count(status) as pcount  FROM plac group by status";
 
 

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['status']."',".$row['pcount']."],";
 }
 ?>
 ]);


        // Set options for Anthony's pie chart.
        var options = {title:'The progress of students enrolled for placements',
                       width:600,
                       height:700};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html>