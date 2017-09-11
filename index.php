<?php include "connectdb.php"; ?> 
<html> 
<?php include "head.php"; ?>
<body> 
<div class="containern"> 
<div class="row"> 
<div class="col-md-6 col-md-offset-3">
<div class="header clerfix"> 
<h3 class="text-muted">Jquery</h3> 
</div> <a href="add_student.php">เพิ่มสมาชิก</a> 
<table class="table table-striped"> 
    <tr class="text-center"> 
        <td>#</td> <td>First Name</td> 
        <td>Last Name</td> 
        <td>ID</td> 
        <td>Faculty</td> 
        <td>Major</td> 
        <td>Action</td> 
    </tr> 
<?php $sql = mysqli_query($conn,"Select * from student inner join major on student.major_id=major.major_id inner join faculty on faCulty.faculty_id=major.faculty_id ORDER BY std_id ASC"); 
    $n=1; 
    while($row = mysqli_fetch_array($sql))
    { 
        echo "<tr class='text-center'>";
        echo "<td>".$n."</td>"; 
        echo "<td>".$row['std_fname']."</td>"; 
        echo "<td>".$row['std_lname']."</td>"; 
        echo "<td>".$row['std_id']."</td>"; 
        echo "<td>".$row['faculty_name']."</td>"; 
        echo "<td>".$row['major_name']."</td>"; 
       // echo "<td> <a href='edit_student.php?std_id=".$row['std_id']."'> <span class='glyphicon glyphicon—pencil' aria—hidden='true'></span> แก้ไข</a> ";
        //echo "<a href='del_student.php?std_id=".$row['std_id']." onclick='return confirm(\"ลบข้อมูลนี้ ?\");'> <span class='glyphicon glyphicon-trash' aria-hidden='true'>ลบ</span> </a> </td>";              
       // echo "</tr>"; 
       echo "<td>
       <a href='edit_student.php?std_id=".$row['std_id']."'>
       <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
       </a>
       <a href='del_student.php?std_id=".$row['std_id']."' onclick='return confirm(\"คุณต้องการลบข้อมูลนี้ ?\");'>
       <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
       </a>
       </td>";
   echo "</tr>";
    
       $n++; 
    } 
    ?>
</table> 
</div> 
</div> 
</div> 
</body> 
</html>  
