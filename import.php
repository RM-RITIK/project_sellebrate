<?php

require 'connection.php';

if (isset($_POST["import"])) {

    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $ready = "SELECT * FROM report where month = '$month' and year = '$year'";
    $h = mysqli_query($link, $ready);
    if(mysqli_num_rows($h)>0) {
        ?>
        <script type = "text/javascript">
        alert("RECORDS ALREADY EXISTS");
        </script>
        <?php
        
        exit();
    }
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
    $name = '';
    
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
                $n = $column[0];
                $name = str_replace("Name :","",$n);
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
                
                $sql = "INSERT INTO attendance (name, staff_id, date, inTime, outTime, totalTime, attendance) VALUES ('$name', '$staffId', '$date', '$inTime', '$outTime', '$totalTime', '$attendance')";
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

?>

<?php

$link = mysqli_connect("localhost", "root", "", "add");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM staff";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        $staff_id = $row['staff_id'];
        $a = "SELECT * FROM attendance WHERE staff_id = ' $staff_id' AND attendance = 'A' AND MONTH(date) = '$month'";
        //echo $a;die;
        $_result = mysqli_query($link, $a);
        //print_r($_result);die;
        $absent = mysqli_num_rows($_result);
        $b = "SELECT * FROM attendance WHERE staff_id = ' $staff_id' AND attendance = 'P' AND MONTH(date) = '$month'";
        $c = mysqli_query($link, $b);
        $present = mysqli_num_rows($c);
        $d = "SELECT * FROM attendance WHERE staff_id = ' $staff_id' AND attendance = 'P/2' AND MONTH(date) = '$month'";
        $e = mysqli_query($link, $d);
        $half = mysqli_num_rows($e);
        $f = "SELECT * FROM attendance WHERE staff_id = ' $staff_id' AND inTime>'9:00' AND MONTH(date) = '$month'";
        $g = mysqli_query($link, $f);
        $late = mysqli_num_rows($g);
        $j = "SELECT * FROM attendance WHERE staff_id = ' $staff_id' AND totalTime<'9:00' AND attendance = 'P'";
        $k = mysqli_query($link, $j);
        $short = mysqli_num_rows($k);

        $query = "INSERT INTO report (staff_id, month, year, absentDays, presentDays, halfDays, lateDays, shortDays) VALUES ('$staff_id', '$month', '$year', '$absent', '$present', '$half', '$late', '$short')";
        mysqli_query($link, $query);
    }
}
header("Location: attendance.php"); 
exit();

?>


