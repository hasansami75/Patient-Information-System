<?php include "doctor_header.php";?>
<?php include "doctor_menu.php" ?>
<?php
    $message = "";
    $doctor_edit_id = $_SESSION['id'];
    $query = "SELECT * FROM doctor WHERE id = {$doctor_edit_id}";
    $doctor_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($doctor_query)){

        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $phone = $row['phone'];
        $facebook_id = $row['facebook_id'];
        $doctor_image = $row['doctor_image'];
    }

    if(isset($_POST['update_doctor'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $facebook_id = $_POST['facebook_id'];

        $doctor_image = $_FILES['doctor_image']['name'];
        $doctor_image_temp = $_FILES['doctor_image']['tmp_name'];
        move_uploaded_file($doctor_image_temp, "images/$doctor_image" );

        if(empty($doctor_image)){
            $query = "SELECT * FROM doctor WHERE id = $doctor_edit_id";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_image)){
                $doctor_image = $row['doctor_image'];
            }
        }

        $query = "UPDATE doctor SET ";
        $query .="name = '{$name}', ";
        $query .="email = '{$email}', ";
        $query .="password = '{$password}', ";
        $query .="phone = '{$phone}', ";
        $query .="facebook_id = '{$facebook_id}', ";
        $query .="doctor_image = '{$doctor_image}' ";
        $query .="WHERE id = {$doctor_edit_id} ";
        
        $update_edit_query = mysqli_query($connection,$query);
        
        confirmQuery($update_edit_query);
        if ($update_edit_query){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['facebook_id'] = $facebook_id;
            $message = "Information has been updated.";
        }

    }
?>



<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6 update-form">
        <form action="update_doctor.php" method="post" enctype="multipart/form-data">
            <fieldset>
               <legend>Update Admin Information</legend>
                <div class="form-group">
                    <label for="admin_name"> Doctor Name</label>
                    <input type="text" class="form-control" name="name" id="first_name" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="admin_email">Doctor Email</label>
                    <input type="email" class="form-control" name="email" id="last_name" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"  value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">
                    <label for="facebook_id">Facebook Id</label>
                    <input type="text" class="form-control" name="facebook_id" id="facebook_id"  value="<?php echo $facebook_id; ?>">
                </div>
                <div class="form-group">
                    <label for="doctor_image">Upload Image</label>
                    <input type="file" name="doctor_image" value="<?php echo $doctor_image; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update_doctor" value="Update Admin">
                </div>
                <p class=""><?php echo $message;?></p>
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<?php include "doctor_footer.php" ?>