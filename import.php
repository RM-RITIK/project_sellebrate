<?php

$link = mysqli_connect("localhost", "root", "", "add");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        $i = 0;
        $staffId = '';
        $date = '';
        $inTime = '';
        $outTime = '';
        $totalTime = '';
        $attendance = '';
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
           
            if($i%10 == 0) {
                $date = $column[2];
            }
            if($i%10 == 1) {
                $inTime = $column[2];
            }
            if($i%10 == 2) {
                $outTime = $column[2];
                $staffId = $column[0];
            }
            if($i%10 == 5) {
                $totalTime = $column[2];
            }
            if($i%10 == 8) {
                $attendance = $column[2];
            }
            if($i%10 == 0 && $i !== 0) {
                
                $sql = "INSERT INTO attendance (staff_id, date, inTime, outTime, totalTime, attendance) VALUES ('$staffId', '$date', '$inTime', '$outTime', '$totalTime', '$attendance')";
                mysqli_query($link, $sql);
            }
            $i++;


            

            
    
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
 

mysqli_close($link);
?>