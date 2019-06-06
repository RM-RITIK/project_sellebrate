  <?php 
  $link = mysqli_connect("localhost", "root", "", "add");
 
  
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
            $id = $_GET["staff_id"];
            
            
            $sql = "DELETE FROM add_staff WHERE staff_id= '$id' ";
            if (mysqli_query($link, $sql)) {
                echo "Record deleted successfully";
                
            } else {
                echo "Error deleting record: " . mysqli_error($link);
            }
            header("Location: http://192.168.64.2/project/info.php"); 
            exit();
             ?>