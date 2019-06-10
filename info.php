<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Othenticate</title>
    <style>
      .exp {
        margin-top: 10px;
        margin-bottom:10px;
        margin-left:10px;
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Report
                        </a>
                        <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item " href="monthlyReport.php">Monthly Report</a>
                        </div>
                    </li>
                    
                  </ul>
                 
                </div>
    </nav>
    <div class="form-inline form exp">
    <form class="form-group ">
    <button type="submit" class="btn btn-primary" onclick="exportTableToCSV('staffList.csv')">Download as CSV</button>
    </form>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Staff ID</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Role</th>
      <th scope="col">Active</th>
      <th scope="col">Joining Date</th>
      <th scope="col">Total working hours</th>
      <th scope="col">Salary</th>
      <th scope="col">Action</th>
      


    </tr>
  </thead>
  <tbody>
  <?php

$link = mysqli_connect("localhost", "root", "", "add");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM add_staff";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        
?>
<tr>
    <td><?php echo $row["staff_id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["phone"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["city"]; ?></td>
    <td><?php echo $row["state"]; ?></td>
    <td><?php echo $row["role"]; ?></td>
    <td><?php echo $row["active"]; ?></td>
    <td><?php echo $row["jDate"]; ?></td>
    <td><?php echo $row["totalWorkingHours"]; ?></td>
    <td><?php echo $row["salary"]; ?></td>
    <td> 
    <a target="_blank" href="delete.php?staff_id=<?php echo $row['staff_id']; ?>">Delete</a>&nbsp;&nbsp;
    <a target="_blank" href="update.php?staff_id=<?php echo $row['staff_id']; ?>">Update</a>


  
 
    </td>

</tr>

<?php 
    }
}
mysqli_close($link);
?> 

  </tbody>
</table>
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