<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/menu.php" ?>
 
 <?php
    $message = " ";
    if(isset($_POST['registration'])){
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $age = trim($_POST['age']);
        $gender = trim($_POST['gender']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $phone = trim($_POST['phone']);

        //image part start
        $patient_image = $_FILES['patient_image']['name'];
        $patient_image_temp = $_FILES['patient_image']['tmp_name'];
        move_uploaded_file($patient_image_temp, "patients/images/$patient_image" );
        
    
        $first_name = mysqli_real_escape_string($connection,$first_name);
        $last_name = mysqli_real_escape_string($connection,$last_name);
        $age = mysqli_real_escape_string($connection,$age);
        $gender = mysqli_real_escape_string($connection,$gender);
        $email = mysqli_real_escape_string($connection,$email);
        $password = mysqli_real_escape_string($connection,$password);
        $phone = mysqli_real_escape_string($connection,$phone);

        //$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO `patients`(`first_name`, `last_name`, `age`, `gender`, `email`, `password`, `phone`, `patient_image`)";
        $query .= "VALUES('{$first_name}','{$last_name}','{$age}','{$gender}','{$email}','{$password}','{$phone}','{$patient_image}')";
        
        $register_query = mysqli_query($connection,$query);
        
        if(!$register_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "Registration Successful.";
        }
    }
?>

<section class="content container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
<!--
                <div class="logo_dept text-center">
                    <img src="images/logo_cse.png" alt="department logo" class="img-responsive">
                    <h3 class="text-capitalize text-white">Computer science and engineering</h3>
                </div>
-->
            </div>
            
            <div class="col-md-6">
                <div class="registration">
                    <h3 class="text-center text-grey text-capitalize">Patient Registration</h3>
                    <br>
                    <form role="form" action="index.php" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name *</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control input-custom" placeholder="First Name" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name *</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control input-custom" placeholder="Last Name" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age">Age *</label>
                            <input type="text" name="age" id="age" class="form-control input-custom" placeholder="Age" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control input-custom" placeholder="somebody@example.com" value="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" name="password" id="key" class="form-control input-custom" placeholder="********" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone *</label>
                            <input type="text" name="phone" id="phone" class="form-control input-custom" placeholder="Phone Number" required>
                        </div>

                        <div class="form-group">
                            <label for="patient_image">Upload Image</label>
                            <input type="file" name="patient_image">
                        </div>
                        <input type="submit" name="registration" id="btn-login" class="btn btn-success" value="Submit">
                        <input type="reset" name="reset" id="btn-reset" class="btn btn-default" value="Refresh">
                    </form>
                    <p><a href="" class="status text-grey"><?php echo $message; ?></a></p>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- footer part include here -->
    <?php include"includes/footer.php"?>