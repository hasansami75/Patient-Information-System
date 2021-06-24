<?php include "doctor_header.php"?>
<?php include "doctor_menu.php"?>

    <section class="body_content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <?php include "left_sidebar.php"?>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10">
                <div class="history">
                    <h1 class="text-uppercase">Assistant Information</h1>
                    <div class="col-sm-offset-4 col-sm-3 assistant-info">

                        <br>
                        <?php
                            $query = "SELECT * FROM assistant";
                            $select_assistant_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_assistant_query)){

                                $id = $row['id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $facebook_id = $row['facebook_id'];
                                $assistant_image = $row['assistant_image'];


                            if(!$select_assistant_query){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        ?>
                        <img src="/pis/assistant/images/<?php echo $assistant_image?>" alt="image" class="img-responsive">
                        <br>
                        <table class="table table-responsive">
                            <tr>
                                <td>First Name:</td>
                                <td><?php echo $first_name?></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><?php echo $last_name ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $email?></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><?php echo $phone?></td>
                            </tr>
                            <tr>
                                <td>Faceook Id:</td>
                                <td><?php echo $facebook_id?></td>
                            </tr>
                            <?php }?>
                        </table>
                        <a href="my_assistant.php?delete=" class="btn btn-custom">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include "doctor_footer.php"?>