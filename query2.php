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
        .tm {
            margin-top: 20px;
        }
        .or {
          font-weight:bold;
        }
        .exp {
          margin-left:40px;
        }
      
    
    </style>
  </head>
  <body>
  <?php include 'header.php' ?>
    <div class="form-inline form">
    <form class="form-group" action = "query.php">
    <label for="inputPassword6">From : </label>
    <input type="date" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "sdate">
    <label for="inputPassword6">To : </label>
    <input type="date" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "edate">
    <button type="submit" class="btn btn-primary">Show</button>
    </form>
    &nbsp;&nbsp;&nbsp;&nbsp;<div class = "or">OR</div>&nbsp;&nbsp;&nbsp;&nbsp;
    <form class="form-group" action = "query2.php">
    <label for="inputPassword6">Search by Name:</label>
    <input type="text" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "name" value = "<?php echo $_REQUEST['name']; ?>">
    <button type="submit" class="btn btn-primary">Show</button>
    </form>
    <form class="form-group exp" action="attendance.php">
    <button type="submit" class="btn btn-primary" onclick="exportTableToCSV('attendancePerson.csv')">Download as CSV</button>
    </form>
    </div>
<table class="table tm">
  <thead>
    <tr>
      <th scope = "col">Name</th>
      <th scope="col">Staff ID</th>
      <th scope="col">Date</th>
      <th scope="col">In Time</th>
      <th scope="col">Out Time</th>
      <th scope="col">Total Time</th>
      <th scope="col">Attendance</th>
    </tr>
  </thead>
  <tbody>
  <?php

$name = $_REQUEST['name'];

$sql = "SELECT * FROM attendance WHERE name like ' $name'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        
?>
<tr>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["staff_id"]; ?></td>
    <td><?php echo $row["date"]; ?></td>
    <td><?php echo $row["inTime"]; ?></td>
    <td><?php echo $row["outTime"]; ?></td>
    <td><?php echo $row["totalTime"]; ?></td>
    <td><?php echo $row["attendance"]; ?></td>


</tr>

<?php 
    }
}
mysqli_close($link);
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