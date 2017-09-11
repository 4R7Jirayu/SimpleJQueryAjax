<?php
 include "connectdb.php";
 if(isset($_POST)){
    $TxtStdId = $_POST['TxtStdId'];
    $TxtFname = $_POST['TxtFname'];
    $TxtLname =$_POST['TxtLname'];
    $TxtMajor = $_POST['TxtMajor'];
   $sql_update = "UPDATE student SET std_fname = '".$TxtFname."', std_lname = '".$TxtLname."',major_id = ".$TxtMajor." where Std_id=".$TxtStdId."";

    $query_sql = mysqli_query($conn,$sql_update);
	if($query_sql){
	 $msg = "แก้ไขข้อมูลสำเร็จ";
	 echo $msg;
	 }else{
	 $msg = "ไม่สามารถแก้ไขข้อมูลได้ [".' '.$query_sql.''."]";
	 echo $msg;
	 }
	 }
?>