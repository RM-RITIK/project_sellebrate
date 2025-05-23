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
              <div >
              
              <div class="container" style="max-width:600px;padding:40px 20px;background:#ebeff2">
                  <h3>Add an entry:</h3>
                  <form class="form-horizontal" role="form" action="insertion.php" method="POST">
                      <div class="form-group">
                          <label for="staffId" class ="control-label col-sm-3">Staff ID:  </label>
                      <div class="col-sm-8">
                              <input type="text" class="form-control" id="name" placeholder="Staff ID" name="staffId">
                      </div>
                          </div>
                   
                    <div class="form-group">
                        <label for="name" class ="control-label col-sm-3">Name:  </label>
                    <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" placeholder="Name:" name="name">
                    </div>
                        </div>
                     <div class="form-group"> 
                        <label for="e-mail" class ="control-label col-sm-3">E-mail:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="address" placeholder="Enter e-mail" name="email">
                    </div>
                      </div>
                     <div class="form-group">
                        <label for="phone" class ="control-label col-sm-3">Phone:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" placeholder="Enter contact" name="phone">
                    </div>
                      </div>
                      <div class="form-group">
                            <label for="active" class ="control-label col-sm-3">Address: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" placeholder="Address" name="address"> 
                        </div>
                          </div>
                      <div class="form-group">
                          <label for="city" class ="control-label col-sm-3">City:</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="email" placeholder="Enter city" name="city">
                      </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class ="control-label col-sm-3">State: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" placeholder="Enter state" name="state">
                        </div>
                          </div>
                          <div class="form-group">
                              <label for="role" class ="control-label col-sm-3">Role: </label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" id="email" placeholder="Enter role" name="role">
                          </div>
                            </div>
                            <div class="form-group">
                                <label for="active" class ="control-label col-sm-3">Active: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" placeholder="Yes/No" name="active">
                            </div>
                              </div>
                              <div class="form-group">
                                    <label for="active" class ="control-label col-sm-3">Joining date: </label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="email" placeholder="Date" name="jdate">
                                </div>
                                  </div>
                                  <div class="form-group">
                                        <label for="active" class ="control-label col-sm-3">Total Working Hours: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="email" placeholder="enter time" name="time">
                                    </div>
                                      </div>
                                      <div class="form-group">
                                            <label for="active" class ="control-label col-sm-3">Salary:  </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="email" placeholder="enter salary" name="salary">
                                        </div>
                                          </div>
                   
                     <div class="col-sm-offset-2 col-sm-8">
                       <button type="submit" class="btn btn-primary">Add</button>
                     </div>
                  </form>
                </div>
              </div>
              <?php include 'footer.php';?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>