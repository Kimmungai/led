<div class="grid_1" >
  <h4>Bar</h4>
  <canvas id="bar1" height="100" width="600" style="width: 600px; height: 100px;"></canvas>
  <script>
    var barChartData = {
      labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Mon","Tue","Wed","Thu"],
      datasets : [
        {
          fillColor : "#8BC34A",
          strokeColor : "#8BC34A",
          data : [25,40,50,65,55,30,20,10,6,4]
        },
        {
          fillColor : "#8BC34A",
          strokeColor : "#8BC34A",
          data : [30,45,55,70,40,25,15,8,5,2]
        }
      ]

    };
      new Chart(document.getElementById("bar1").getContext("2d")).Bar(barChartData);
  </script>
</div>
