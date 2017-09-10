<?php
include "connectbd.php";

if(isset($_POST)){
    $std_id = $_POST['std_id'];
    $TxtFname = $_POST['TxtFname'];
    $TxtLname =$_POST['TxtLname'];
    $TxtMajor = $_POST['TxtMajor'];

    $sql_update = "UPDATE student SET std_fname = '".$TxtFname."', std_lname = '".$TxtLname."', std_id='".$std_id."',major_id = '".$TxtMajor."' where Sdt_id='".$std_id."'";

    $query_sql = mysqli_query($conn,$sql_update);
    if($query_sql){
        $msg = "แก้ไขข้อมูลสำเร็จ";
        echo $msg;
    }
    else{
        $msg = "แก้ไขข้อมูลไม่สำเร็จ".$query_sql."";
        echo $msg;
    }
}
?>