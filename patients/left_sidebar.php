<div class="left-sidebar ">
    <div class="widget profile-picture">
        <?php
        $id = $_SESSION['id'];
        $query = "SELECT * FROM patients WHERE id = {$id}";
        $select_user_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_user_query)){

            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $age = $row['age'];
            $gender = $row['gender'];
            $email = $row['email'];
            $password = $row['password'];
            $patient_image = $row['patient_image'];
        }

        if(!$select_user_query){
            die("Query Failed" . mysqli_error($connection));
        }
        ?>

        <?php
        echo "<p class='text-center'><img src='images/{$patient_image}' class='img-responsive' alt='user_image'></p>";
        ?>
        <h3 class="text-capitalize"><span><?php echo $first_name. ' '. $last_name. ' '?></span></h3>

    </div>
    <div class="widget profile-info">
        <p>Age: <?php echo $age;?></p>
        <p class="text-capitalize">Gender: <?php echo $gender;?></p>
        <p>Email: <?php echo $email;?></p>
        <br>
        <p>
            <a href='patients_update.php?p_id=<?php echo $id ?>' class='btn btn-primary'>Update</a>
            <a href="give-serial.php?p_id=<?php echo $id ?>" class="btn btn-warning">Give Serial</a>
        </p>
    </div>
    <div class="widget serial-id">
        <?php
            $message = "";
            $query = "SELECT * FROM serial WHERE patient_id = $id";
            $select_serial_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_serial_query)){
                $serial_id = $row['serial_id'];
            }
            if ($count = mysqli_num_rows($select_serial_query)){
                $message = "Your serial no is: ";
                echo "<p>$message $serial_id</p>";
            }
            else{
                echo $message;
            }

        ?>
    </div>
</div>