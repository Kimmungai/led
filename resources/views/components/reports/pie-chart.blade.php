<div class="grid_1">
  <h4>Pie</h4>
  <div class="legend">
    <div id="os-Win-lbl">Chrome <span>100%</span></div>
    <div id="os-Mac-lbl">Internet Explorer <span> 50%</span></div>
    <div id="os-Other-lbl">Safari<span>30%</span></div>
   </div>

  <canvas id="pie" height="315" width="470" style="width: 470px; height: 315px;"></canvas>
  <script>
    var pieData = [
      {
        value: 30,
        color:"#ef553a"
      },
      {
        value : 50,
        color : "#00aced"
      },
      {
        value : 100,
        color : "#8BC34A"
      }

    ];
    new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
  </script>
</div>
