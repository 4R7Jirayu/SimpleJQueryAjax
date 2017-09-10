<div class="page-header"› 
<?php include "connectdb.php"; ?> 
<html> 
    <?php include "head.php"; ?>
    <body> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-6 col-md-offset-3"> 
                    <h3>untaul3n</h3> 
                </div> 
                <a href="index.php">milluln</a> 
                <?php 
                    $sql = mysqli_query($conn,"select * from student where std_id=".$_GET['std_id'].""); 
                    while($row = mysqli_fetch_array($sql)){
                         $fname = $row['std_fname']; 
                         $lname = $row['std_lname'];                          
                         $std_id = $row['std_id']; 
                         $major_id = $row['major_id']; 
                        } 
                    if($_GET['std_id'] != ''){
                    ?>
                <form class="form-horizontal"> 
                    <div class="form-group"> 
                    <label class="col-sm-3 control-label">First Name</label> 
                    <div class="col-sm-8"> 
                    <input type="hidden" class="form-control" id="std_id" value="<?php echo $std_id;?>" required> 
                    <input type="text" class="form-control" id="firstname" value="<?php echo $fname;?>" required> 
                    <span id="error_f"></span> 
                </div> 
            </div> 
            <div class="form-group"> 
            <label class="col-sm-3 control-label">Last Name</tabel> 
            <div class="col-sm-8"> 
                <input type="text" class="form-control" id="lastname" value="<?php echo $lname;?>" required> 
            </div> 
        </div> 
        <div class="form-group"> 
        <label class="col-sm-3 control-label">Student ID</label> 
        <div class="col-sm-8"> 
            <input type="text" class="form-control" id="std_id" value=" <?php echo $std_id;?>" maxlength="11" required> 
        </div> 
    </div> 
    <div class="form—group"> 
        <label class="col—sm-3 control—label">Faculty</label> 
        <div class="col—sm-8"> 
            <select class="form—control" id="faculty"> 
            <?php  

            $fc = mysqli_query($conn ,"select * from faculty"); 
            while($row = mysqli_fetch_array($fc)){ 
                echo "<option value=".$row['faculty_id'].">".$row['faculty_name']."</option>";
            }
            
            /*    $sql_faculty = mysqli_query($conn,"select * from faculty "); 
                while($faculty = mysqli_fetch_array(Ssql_faculty)){ 
                    if($faculty['faculty_id'] == $major_id){ 
                        $selected = "selected"; 
                    }
                    else{ 
                        $selected = ""; 
                    }
                    echo "<option value=".$major['major_id']." ".$selected.">".$major['major_name']."</option>";
                 }     */            
             //INNER JOIN major on faculty.faculty_id=major.faculty_id GROUP BY faculty_name
            ?> 
            </select> 
        </div> 
    </div> 
    <div class="form—group"> 
        <div class="col—sm-3">
            <button type="submit" class="btn btn—default">Save</button> 
        </div> 
    </div> 
    </form> 
         <?php }else{header('Location: index.php');} ?>
    </div> 
</div> 
</div> 
<script> 
    $(document).ready(function(){ 
        $('.btn').on('click',function(){ 
            var TxtFname = $('#firstname').val(); 
            var TxtLname = $('#lastname').val(); 
            var TxtStd = $('#std_id').val(); 
            var TxtMjor = $('#major').val(); 
            if(std_id =''){
                $.ajax({
                    type: "POST",
                    url: "edit_student2.php",
                    data: {
                        'TxtFname': TxtFname, 
                        'TxtLname': TxtLname, 
                        'TxtStdId': TxtStdId, 
                        'TxtMajor': TxtMajor 
                    },
                    success: function(data){
                        alert( data );
                        top.location.href = "index.php"
                    }
                });
                return false;
            }else{
                alert("กรุณากรอกข้อมูล")ว
                return false;
            }
        });
    });
</script>         
</body>
</html>         