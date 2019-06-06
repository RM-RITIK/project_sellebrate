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
    
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Othenticate</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Staff
                      </a>
                      <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item " href="info.php">Staff List</a>
                        <a class="dropdown-item" href="form_1.html">Add</a>
                        
                      </div>
                  </li>
                   
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Attendance
                      </a>
                      <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item " href="attendance.php">List</a>
                        <a class="dropdown-item" href="upload.php">Upload</a>
                        
                      </div>
                    </li>
                    
                  </ul>
                 
                </div>
    </nav>
    <div class="form-inline form">
    <form class="form-group" action = "query.php">
    <label for="inputPassword6">From : </label>
    <input type="date" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "sdate" value = "<?php echo $_REQUEST['sdate']; ?>">
    <label for="inputPassword6">To : </label>
    <input type="date" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "edate" value = "<?php echo $_REQUEST['edate']; ?>">
    <button type="submit" class="btn btn-primary">Show</button>
    </form>
    &nbsp;&nbsp;&nbsp;&nbsp;<div class = "or">OR</div>&nbsp;&nbsp;&nbsp;&nbsp;
    <form class="form-group" action = "query2.php">
    <label for="inputPassword6">Search by Name:</label>
    <input type="text" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "name">
    <button type="submit" class="btn btn-primary">Show</button>
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

$link = mysqli_connect("localhost", "root", "", "add");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sdate = $_REQUEST['sdate'];
$x = strtotime($sdate);
$s = date("Y-m-d",$x);
$edate = $_REQUEST['edate'];
$y = strtotime($edate);
$e = date("Y-m-d",$y);


$sql = "SELECT * FROM attendance WHERE date>='$s' AND date<='$e'";
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
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>