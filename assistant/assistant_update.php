<?php include "assistant_header.php";?>
<?php include "assistant_menu.php"?>
<?php
$message = " ";
$assistant_edit_id = $_SESSION['id'];
$query = "SELECT * FROM assistant WHERE id = {$assistant_edit_id}";
$patient_query = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($patient_query)){

    $id = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $password = $row['password'];
    $phone = $row['phone'];
    $assistant_image = $row['assistant_image'];
    $facebook_id = $row['facebook_id'];
}

?>
<?php

if(isset($_POST['update_assistant'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $assistant_image = $_FILES['assistant_image']['name'];
    $assistant_image_temp = $_FILES['assistant_image']['tmp_name'];
    move_uploaded_file($assistant_image_temp, "images/$assistant_image" );

    if(empty($assistant_image)){
        $query = "SELECT * FROM assistant WHERE id = $assistant_edit_id";
        $select_image = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_image)){
            $assistant_image = $row['assistant_image'];
        }
    }

    $query = "UPDATE assistant SET ";
    $query .="id = '{$id}', ";
    $query .="first_name = '{$first_name}', ";
    $query .="last_name = '{$last_name}', ";
    $query .="email = '{$email}', ";
    $query .="password = '{$password}', ";
    $query .="phone = '{$phone}', ";
    $query .="assistant_image = '{$assistant_image}' ";
    $query .="WHERE id = {$assistant_edit_id} ";

    $assistant_edit_query = mysqli_query($connection,$query);

    $confirm = confirmQuery($assistant_edit_query);
    $message = "Information has been updated";

}
?>



    <div class="body_content container">
        <div class="col-md-3"></div>
        <div class="col-md-6 update-form">
            <form action="assistant_update.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Update Assistant Information</legend>
                    <div class="form-group">
                        <label for="first_name"> First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
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
                        <input type="file" name="assistant_image" value="<?php echo $assistant_image; ?>">
                    </div>
                    <div class="form-group">
                        <label for="patient_image">Facebook Id</label>
                        <input type="text" name="facebook_id" class="form-control" value="<?php echo $facebook_id; ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update_assistant" value="Update">
                    </div>

                    <?php echo $message;?>
                </fieldset>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>


<?php include "assistant_footer.php"?>