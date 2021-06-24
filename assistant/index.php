<?php include "assistant_header.php"?>
<?php include "assistant_menu.php"?>

    <section class="body_content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <?php include "left_sidebar.php"?>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10">
                <div class="history">
                    <h1 class="text-uppercase">Serials</h1>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Date</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Ask Symptom</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $query = "SELECT patients.id, patients.first_name, patients.last_name, patients.age, patients.gender, patients.email,  patients.phone, patients.patient_image, ";
                            $query .= "serial.serial_id, serial.patient_id, serial.date ";
                            $query .= " FROM patients LEFT JOIN serial ON patients.id = serial.patient_id";

                            $select_assistant_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_assistant_query)){

                                $id = $row['id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $age = $row['age'];
                                $gender = $row['gender'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $patient_image = $row['patient_image'];
                                $serial_id = $row['serial_id'];
                                $patient_id = $row['patient_id'];
                                $date = $row['date'];

                                if (!empty($serial_id)){
                        ?>
                        <tr>
                            <td><?php echo $serial_id?></td>
                            <td><?php echo $date?></td>
                            <td><?php echo $first_name?></td>
                            <td><?php echo $last_name?></td>
                            <td><?php echo $age?></td>
                            <td><?php echo $gender?></td>
                            <td><?php echo $phone?></td>
                            <td><a href="ask_symptom.php?p_id=<?php echo $patient_id ;?>" class="btn btn-sm btn-warning">Ask</a></td>
                        </tr>
                        <?php
                            }}

                            if(!$select_assistant_query){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


<?php include "assistant_footer.php"?>