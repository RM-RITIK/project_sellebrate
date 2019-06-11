<?php
   include('session.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Othenticate</title>
  </head>
  <body>
  <?php include 'header.php' ?>


  <?php

$link = mysqli_connect("localhost", "root", "", "add");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = $_GET["staff_id"];
$sql = "SELECT * FROM add_staff WHERE staff_id = '$id'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        

?>
              <div class="container" style="max-width:600px;padding:40px 20px;background:#ebeff2">
                  
                  <form class="form-horizontal" role="form"  method="POST" action = "updateFunc.php?staff_id=<?php echo $row['staff_id']; ?>">
                   
                    <div class="form-group">
                        <label for="name" class ="control-label col-sm-3">Name:  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value = "<?php echo $row["name"] ?>">
                    </div>
                    </div>
                    <div class="form-group"> 
                        <label for="e-mail" class ="control-label col-sm-3">E-mail:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="address" name="email" value = "<?php echo $row["email"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class ="control-label col-sm-3">Phone:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="phone" value = "<?php echo $row["phone"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="active" class ="control-label col-sm-3">Address: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email"  name="address" value = "<?php echo $row["address"] ?>"> 
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class ="control-label col-sm-3">City:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email"  name="city"  value = "<?php echo $row["city"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="state" class ="control-label col-sm-3">State: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email"  name="state" value = "<?php echo $row["state"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class ="control-label col-sm-3">Role: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email"  name="role" value = "<?php echo $row["role"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="active" class ="control-label col-sm-3">Active: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email"  name="active" value = "<?php echo $row["active"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="active" class ="control-label col-sm-3">Joining date: </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="email"  name="jdate" value = "<?php echo $row["jDate"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="active" class ="control-label col-sm-3">Total Working Hours: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email"  name="time" value = "<?php echo $row["totalWorkingHours"] ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="active" class ="control-label col-sm-3">Salary:  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="salary" value = "<?php echo $row["salary"] ?>">
                    </div>
                    </div>
                   
                     <div class="col-sm-offset-2 col-sm-8">
                       <button type="submit" class="btn btn-primary" >Update</button>
                     </div>
                  </form>
                </div>

    <?php 
    }
}
?>
<?php include 'footer.php';?> 


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>




