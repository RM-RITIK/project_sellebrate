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
		.main {
			margin-top:20px;
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
                        <a class="dropdown-item" href="form_1.php">Add</a>
                        
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
	<div class = "main">
	<form class="form-horizontal" action="import.php" method="post" name="uploadCSV"
    enctype="multipart/form-data">
    <div class="input-row">
        <label class="col-md-4 control-label">Choose CSV File:</label>
		<input type="file" name="file" id="file" accept=".csv">
		<label>Year:</label>
		<select name="year">
        <? for ($year=2014; $year <= 2030; $year++): ?>
        <option value="<?=$year;?>"><?=$year;?></option>
        <? endfor; ?>
        </select>
		<label>Month:</label>
		<select name="month">
        <? for ($month=1; $month <= 12; $month++): ?>
        <option value="<?=$month;?>"><?=$month;?></option>
        <? endfor; ?>
        </select>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Import</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to submit?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="import" class="btn-submit btn-primary btn">Save changes</button>
        </div>
        </div>
        </div>
        </div>
        <br />

    </div>
    <div id="labelError"></div>
</form>
</div>

<script type="text/javascript">
	$(document).ready(
	function() {
		$("#frmCSVImport").on(
		"submit",
		function() {

			$("#response").attr("class", "");
			$("#response").html("");
			var fileType = ".csv";
			var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
					+ fileType + ")$");
			if (!regex.test($("#file").val().toLowerCase())) {
				$("#response").addClass("error");
				$("#response").addClass("display-block");
				$("#response").html(
						"Invalid File. Upload : <b>" + fileType
								+ "</b> Files.");
				return false;
			}
			return true;
		});
	});
</script>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
