<?php 
    include "connectdb.php"; 
   // $sql = mysqli_query($conn,"SELECT * FROM `major`WHERE `faculty_id` = );
   $sql = mysqli_query($conn,"SELECT * FROM major WHERE faculty_id = ".$_POST['id']."");

   while($row = mysqli_fetch_array($sql)){
        echo "<option value=".$row['major_id'].">".$row['major_name']."</option>";
    }
?> 