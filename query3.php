<?php
   include('session.php');
?>
<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Othenticate</title>
    <style>
        .form {
            margin-top: 10px;
            margin-left: 20px;
        }
       
        .or {
          font-weight:bold;
        }

        .tb {
            margin-top: 20px;
        }
        .exp {
          margin-left: 40px;
        }
      
    
    </style>
  </head>
  <body>
  <?php include 'header.php' ?>
    <div class="form-inline form">
    <form class="form-group" action = "query3.php">
    <label for="inputPassword6">Month :</label>
    <input type="month" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "month" value = "<?php echo $_REQUEST['month']; ?>">
    <button type="submit" class="btn btn-primary">Show</button>
    </form>
    <form class="form-group exp" action="monthlyReport.php">
    <button type="submit" class="btn btn-primary" onclick="exportTableToCSV('monthlyReport.csv')">Download as CSV</button>
    </form>
    </div>

<table class="table tb">
  <thead>
    <tr>
      <th scope="col">Staff Id</th>
      <th scope="col">Name</th>
      <th scope="col">Absent Days</th>
      <th scope="col">Present Days</th>
      <th scope="col">Late Days</th>
      <th scope="col">Half Days</th>
      <th scope="col">Short Days</th>
      <th scope = "col">Previous Leave Balance</th>
      <th scope = "col">Net Balance</th>

    </tr>
  </thead>
  <tbody>
  <?php 
$month = $_REQUEST['month'];
$x = strtotime($month);
$m = date("m", $x);
$y = date("Y", $x);
$mo = str_replace("0","",$m);
$query = "SELECT * FROM report WHERE month = '$mo' AND year = '$y'";
$_result = mysqli_query($link, $query);
if(mysqli_num_rows($_result) == 0) {
  echo "NO RECORD FOUND";
  exit();
}
if(in_array("monthly_report_all", $_SESSION['permissions'])) {
$sql = "SELECT * FROM staff";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
      $staff_id = $row['staff_id'];
      $name = $row['name'];
      $a = "SELECT * FROM report WHERE staff_id = ' $staff_id' AND month = '$mo' AND year = '$y'";
      $b = mysqli_query($link, $a);
      $c = mysqli_fetch_assoc($b);
      $d = "SELECT leaveBalance FROM staff WHERE staff_id = '$staff_id'";
      $e = mysqli_query($link, $d);
      $f = mysqli_fetch_assoc($e);
      $leaveBalance = $f['leaveBalance'];
      $netBalance = $leaveBalance + 3 - $c['absentDays'];



  ?>
  <tr>
  <td><?php echo $staff_id; ?></td>
  <td><?php echo $name; ?></td>
  <td><?php echo $c['absentDays']; ?></td>
  <td><?php echo $c['presentDays']; ?></td>
  <td><?php echo $c['lateDays']; ?></td>
  <td><?php echo $c['halfDays']; ?></td>
  <td><?php echo $c['shortDays']; ?></td>
  <td><?php echo $leaveBalance; ?></td>
  <td><?php echo $netBalance; ?></td>

  </tr>

  <?php
    }
  }
}
elseif(in_array("monthly_report_particular", $_SESSION['permissions'])) {
  $staff_id = $_SESSION['staff_id'];
  $a = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
  $b = mysqli_query($link, $a);
  $c = mysqli_fetch_assoc($b);
  $name = $c['name'];
  $leaveBalance = $c['leaveBalance'];
  $d = "SELECT * FROM report WHERE staff_id = ' $staff_id' AND month = '$mo' AND year = '$y'";
  $e = mysqli_query($link, $d);
  $f = mysqli_fetch_assoc($e);
  $netBalance = $leaveBalance + 3 - $f['absentDays'];

  ?>
    <tr>
  <td><?php echo $staff_id; ?></td>
  <td><?php echo $name; ?></td>
  <td><?php echo $f['absentDays']; ?></td>
  <td><?php echo $f['presentDays']; ?></td>
  <td><?php echo $f['lateDays']; ?></td>
  <td><?php echo $f['halfDays']; ?></td>
  <td><?php echo $f['shortDays']; ?></td>
  <td><?php echo $leaveBalance; ?></td>
  <td><?php echo $netBalance; ?></td>

  </tr>
<?php }
?>
  </tbody>
</table>
<?php include 'footer.php';?>
<script type = "text/javascript">
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}

</script>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>