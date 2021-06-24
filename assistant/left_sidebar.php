<div class="left-sidebar ">
    <div class="widget profile-picture">
        <?php
            $id = $_SESSION['id'];
            $query = "SELECT * FROM assistant WHERE id = {$id}";
            $select_assistant_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_assistant_query)){

                $id = $row['id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $password = $row['password'];
                $phone = $row['phone'];
                $assistant_image = $row['assistant_image'];
                $facebook_id = $row['facebook_id'];
            }

            if(!$select_assistant_query){
                die("Query Failed" . mysqli_error($connection));
            }
        ?>

        <?php
        echo "<p class='text-center'><img src='images/$assistant_image' class='img-responsive' alt='assistant_image'></p>";
        ?>
        <h3 class="text-capitalize"><span><?php echo $first_name ." ". $last_name;?></span></h3>

    </div>
    <div class="widget profile-info">
        <p><a href=""><span><i class="fa fa-envelope"></i></span><?php echo $email;?></a></p>
        <p class="text-capitalize"><span><i class="fa fa-phone"></i></span><?php echo $phone;?></p>
        <p><a href="https://www.facebook.com/profile.php?id=100008636140643"><span><i class="fa fa-facebook"></i></span><?php echo $facebook_id;?></a></p>
        <br>
        <p class=""><a href='assistant_update.php?a_id=<?php echo $id ?>' class='btn btn-info'>Update</a></p>
    </div>

</div>