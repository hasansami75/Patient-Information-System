<?php include "doctor_header.php"?>
<?php include "doctor_menu.php"?>

    <section class="body_content container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include "left_sidebar.php"?>
            </div>
            <div class="col-md-9">
                <div class="history">
                    <h1 class="text-uppercase">My Patients</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Patient Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM patients";
                                $select_patient_query = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_patient_query)){
                                    $id = $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $age = $row['age'];
                                    $gender = $row['gender'];
                                    $email = $row['email'];
                                    $password = $row['password'];
                                    $patient_image = $row['patient_image'];
                                ?>
                                    <tr class="">
                                        <td><?php echo $id ?></td>
<!--                                        <td><img src="../patients/images/--><?php //echo $patient_image ?><!--" alt="" class="img-responsive"></td>-->
                                        <td><?php echo $first_name ?></td>
                                        <td><?php echo $last_name ?></td>
                                        <td><?php echo $age ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><a href="patient_details.php?patient_id=<?php echo $id ?>" class="btn btn-sm btn-info">Details</a></td>
                                    </tr>
                            <?php
                            }
                                if(!$select_user_query){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


<?php include "doctor_footer.php"?>