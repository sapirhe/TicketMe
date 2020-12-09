<main>
  <section>               
    <div class="reg_form_border container">
        <h4 id="title">סטטיסטיקת רכישות</h4>
        <div class="inputWrapper center" id="btnStatistics"><input id="submit" type="button" value="הצגת סטטיסטיקת הרכישות" name="submit" style="background-color: #8FBC8F;"></div>
        
          <div id="statistics">  
            <table class="table container">
                        <thead>
                            <tr>
                                <th scope="col">מספר מופע</th>
                                <th scope="col">מספר רכישות</th>
                                <th scope="col">שם האומן</th>
                                <th scope="col">אולם</th>
                                <th scope="col">תאריך</th>
                                <th scope="col">שעה</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($showsStatistics as $stat){ 
                            $time=$stat['time'];
                            $time=substr($time,0,5);?>
                            <tr>
                                <th scope="row"><?php echo $stat['show_id']; ?></th>
                                <td><b><?php echo $stat['COUNT(costumer_number)']; ?></b></td>
                                <td><?php echo $stat['artist_name']; ?></td>
                                <td><?php echo $stat['hall_name']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($stat['date'])); ?></td>
                                <td><?php echo $time; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
              </table>
              <div id="piechart"></div>
        </div>
    </div>
    
 
    
    <script>
        $(document).ready(function(){
            $("#btnStatistics").click(function(){
              $("#statistics").toggle();
        });
      });
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['מספר המופע', 'מספר הרכישות'],
          <?php
           foreach ($showsStatistics as $static){
               echo "['#".$static['show_id']." - ".$static['artist_name']." - ".$static['hall_name']." - ".date('d-m-Y', strtotime($static['date']))."', ".$static['COUNT(costumer_number)']."],";
           }
          ?>
        ]);

        var options = {
          title: 'סטטיסטיקת רכישות המופעים',
          height: 500,
          width: 1000,
          margin: 0,
          padding: 0,
          is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        
        chart.draw(data, options);
      }
    </script>
  </section>

