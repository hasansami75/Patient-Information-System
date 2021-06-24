<?php include "patients_header.php";?>
<?php include "patients_menu.php"?>
<?php
    $message = " ";
    $patient_edit_id = $_SESSION['id'];
    $query = "SELECT * FROM patients WHERE id = {$patient_edit_id}";
    $patient_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($patient_query)){

        $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $age = $row['age'];
        $gender = $row['gender'];
        $email = $row['email'];
        $password = $row['password'];
        $phone = $row['phone'];
        $patient_image = $row['patient_image'];
    }

?>
<?php

    if(isset($_POST['update_patient'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $patient_image = $_FILES['patient_image']['name'];
        $patient_image_temp = $_FILES['patient_image']['tmp_name'];
        move_uploaded_file($patient_image_temp, "images/$patient_image" );
        
        if(empty($patient_image)){
            $query = "SELECT * FROM patients WHERE id = $patient_edit_id";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image)){
                $patient_image = $row['patient_image'];
            }
        }
        
        $query = "UPDATE patients SET ";
        $query .="id = '{$id}', ";
        $query .="first_name = '{$first_name}', ";
        $query .="last_name = '{$last_name}', ";
        $query .="age = '{$age}', ";
        $query .="gender = '{$gender}', ";
        $query .="email = '{$email}', ";
        $query .="password = '{$password}', ";
        $query .="phone = '{$phone}', ";
        $query .="patient_image = '{$patient_image}' ";
        $query .="WHERE id = {$patient_edit_id} ";
        
        $patient_edit_query = mysqli_query($connection,$query);
        
        $confirm = confirmQuery($patient_edit_query);
        $message = "Information has been updated";
        
    }
?>



<div class="body_content container">
    <div class="col-md-3"></div>
    <div class="col-md-6 update-form">
        <form action="patients_update.php" method="post" enctype="multipart/form-data">
            <fieldset>
               <legend>Update Student Information</legend>
                <div class="form-group">
                    <label for="first_name"> First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" name="age" id="age" value="<?php echo $age; ?>">
                </div>
                <div class="form-group">
                    <label for="gender"> Gender</label>
                    <input type="text" class="form-control" name="gender" id="gender"value="<?php echo $gender; ?>">
                </div>
                <div class="form-group">
                    <label for="user_email">Patient Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">User Password</label>
                    <input type="password" class="form-control" name="password" id="user_password" value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">User Phone</label>
                    <input type="phone" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">
                    <label for="patient_image">Upload Image</label>
                    <input type="file" name="patient_image" value="<?php echo $patient_image; ?>">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update_patient" value="Update">
                </div>

                <?php echo $message;?>
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<?php include "patients_footer.php"?>