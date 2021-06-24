<div class="left-sidebar ">
    <div class="widget profile-picture">
        <?php
            $id = $_SESSION['id'];
            $query = "SELECT * FROM doctor WHERE id = {$id}";
            $select_user_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_user_query)){

                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $password = $row['password'];
                $phone = $row['phone'];
                $facebook_id = $row['facebook_id'];
                $doctor_image = $row['doctor_image'];
            }

            if(!$select_user_query){
                die("Query Failed" . mysqli_error($connection));
            }
        ?>

        <?php
        echo "<p class='text-center'><img src='images/$doctor_image' class='img-responsive' alt='doctor_image'></p>";
        ?>
        <h3 class="text-capitalize"><span><?php echo $name;?></span></h3>

    </div>
    <div class="widget profile-info">
        <p><a href=""><span><i class="fa fa-envelope"></i></span><?php echo $email;?></a></p>
        <p class="text-capitalize"><span><i class="fa fa-phone"></i></span><?php echo $phone;?></p>
        <p><a href="https://www.facebook.com/profile.php?id=100011511939591"><span><i class="fa fa-facebook"></i></span><?php echo $facebook_id;?></a></p>
        <br>
        <p class=""><a href='update_doctor.php' class='btn btn-info btn-lg'>Update</a></p>
    </div>
</div>