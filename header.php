<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="query4.php?month=2019-05">Othenticate</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                  <?php
                  $p = $_SESSION['permissions'];
                  if(in_array("staff_list_view", $p) || in_array("staff_add", $p) || in_array("staff_list_edit", $p)) {
                  ?>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Staff
                      </a>
                      <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                      <?php
                      if(in_array("staff_list_view", $p) || in_array("staff_list_edit", $p)) { 
                      ?>
                        <a class="dropdown-item " href="info.php">Staff List</a>
                      <?php
                      }
                      ?>
                      <?php if(in_array("staff_add", $p)) { ?>
                        <a class="dropdown-item" href="form_1.php">Add</a>
                      <?php
                      }
                      ?>
                        
                      </div>
                  </li>
                  <?php
                  }
                  ?>
                   
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Attendance
                      </a>
                      <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item " href="attendance.php">List</a>
                        <?php 
                        if(in_array("attendance_upload", $p)) {
                          ?>
                        <a class="dropdown-item" href="upload.php">Upload</a>
                        <?php }
                        ?>
                        
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
                  <form class="form-inline" action = "logout.php">
                  <button class="btn btn-outline-success my-2 my-sm-0" type = "submit">Logout</button>
                  </form>
                 
                </div>
    </nav>

    <?php require 'connection.php'; ?>