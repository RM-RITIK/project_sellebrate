<?php

$link = mysqli_connect("localhost", "root", "", "add");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST["import"])) {

    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $fileName = $_FILES["file"]["tmp_name"];
    $j = 2;
    while($j<31){
    $i = 0;
    $staffId = '';
    $date = '';
    $inTime = '';
    $outTime = '';
    $totalTime = '';
    $attendance = '';
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
      
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
           
            if($i%10 == 0) {
                $d = $column[$j]."-".$month."-".$year;
                $x = strtotime($d);
                $date = date("Y-m-d", $x);
            }
            if($i%10 == 1) {
                $inTime = $column[$j];
            }
            if($i%10 == 2) {
                $outTime = $column[$j];
                $s = $column[0];
                $staffId = str_replace("E.Code :","",$s);
            
            }
            if($i%10 == 5) {
                $totalTime = $column[$j];
            }
            if($i%10 == 8) {
                $attendance = $column[$j];
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
    $j++;
    }
}
 

mysqli_close($link);
header("Location: http://192.168.64.2/project/attendance.php"); 
exit();
?>