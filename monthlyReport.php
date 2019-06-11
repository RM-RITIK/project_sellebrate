<!doctype html>
<?php
   include('session.php');
?>
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
      
    
    </style>
  </head>
  <body>
    <?php include 'header.php'; ?>

    <div class="form-inline form">
    <form class="form-group" action = "query3.php">
    <label for="inputPassword6">Month :</label>
    <input type="month" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name = "month">
    <button type="submit" class="btn btn-primary">Show</button>
    </form>
    </div>

<table class="table tb">
  <thead>
    <tr>
      <th scope="col">Staff Id</th>
      <th scope="col">Absent Days</th>
      <th scope="col">Present Days</th>
      <th scope="col">Late Days</th>
      <th scope="col">Half Days</th>
      <th scope="col">Short Days</th>
      <th scope = "col">Permitted Leaves</th>
      <th scope = "col">Previous Leave Balance</th>
      <th scope = "col">Net Balance</th>

    </tr>
  </thead>
  <tbody>
  </tbody>
</table>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>