<?php
   include('session.php');
?>
<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


      google.charts.load('current', {'packages':['corechart']});


      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {

 
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Employee Name');
        data.addColumn('number', 'Absent Days');
        data.addColumn('number', 'Late Days');
        data.addColumn('number', 'Short Days');
        data.addRows([
           <?php
             $month = $_REQUEST['month'];
             $x = strtotime($month);
             $mo = date("m", $x);
             $m = str_replace("0","", $mo);
             $y = date("Y", $x);
             $link = mysqli_connect("localhost", "root", "", "add");
            if($link === false){
               die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM report WHERE month = '$m' AND year = '$y'";
            $result = mysqli_query($link, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    $staff_id = $row["staff_id"];
                    $id = str_replace(" ","",$staff_id);
                    $query = "SELECT * FROM add_staff WHERE staff_id = '$id'";
                    $_result = mysqli_query($link, $query);
                    $r = mysqli_fetch_assoc($_result);
                    $name = $r['name'];
                    echo "['$name', $row[absentDays], $row[lateDays], $row[shortDays]],";
                    
                }
            }

            ?>
        ]);

     
        var options = {'title':'Trend Analysis',
                       'width':1000,
                       'height':1000
                      };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      
    </script>

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .form {
        margin-top:20px;
        margin-left:20px;
    }
    .chart {
    width: 100%; 
    min-height: 450px;
}

    </style>

    <title>Othenticate</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="form-inline form">
    <form class="form-group" action = "query4.php">
    <label for="inputPassword6">Month :</label>
    <input type="month" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "month" value = "<?php echo $month; ?>">
    <button type="submit" class="btn btn-primary">Show</button>
    </form>
    </div>

 <div class = "row">
    <div class = "col-md-6">
    <div id="chart_div" class = "chart"></div>
 </div>   
    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>