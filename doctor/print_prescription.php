<?php include "doctor_header.php"?>
<?php include "doctor_menu.php"?>
<?php
    if (isset($_GET['p_id'])) {
        $p_id = $_GET['p_id'];
        $query = "DELETE FROM serial WHERE patient_id = '{$p_id}'";
        $delete_query = mysqli_query($connection,$query);

        $q = "select * from serial";
        $select_query = mysqli_query($connection,$q);

        if ($row = mysqli_num_rows($select_query)){

        }
        else{
            $drop_query = "ALTER TABLE serial AUTO_INCREMENT = 1 ";
            $select_drop_query = mysqli_query($connection,$drop_query);
            if(!$select_drop_query){
                die("Query Failed" . mysqli_error($select_drop_query));
            }
        }

        if(!$delete_query){
            die("Query Failed" . mysqli_error($connection));
        }
    }
?>
    <section class="body_content container-fluid">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="history">
                    <h1 class="text-uppercase">Prescription Information</h1>
                    <div class="col-sm-offset-3 col-sm-4 col-md-4">
                        <?php
                            if (isset($_GET['p_id'])){
                                $p_id = $_GET['p_id'];

                                if(isset($_GET['v_id'])){
                                    $query = "SELECT history.visit_no, history.patient_id, history.symptom, history.date,";
                                    $query .= "patients.id, patients.first_name, patients.last_name, patients.age, patients.gender, patients.patient_image ";
                                    $query .= " FROM history LEFT JOIN patients ON history.patient_id = patients.id WHERE patients.id = '{$p_id}' AND visit_no= '{$_GET['v_id']}'";

                                    $select_serial_query = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_serial_query)) {

                                        $visit_no = $row['visit_no'];
                                        $patient_id = $row['patient_id'];
                                        $date = $row['date'];
                                        $first_name = $row['first_name'];
                                        $last_name = $row['last_name'];
                                        $age = $row['age'];
                                        $gender = $row['gender'];
                                        $patient_image = $row['patient_image'];
                                    }
                                }

                                else{
                                    $query = "SELECT history.id, history.visit_no, history.patient_id, history.symptom, history.date,";
                                    $query .= "patients.id, patients.first_name, patients.last_name, patients.age, patients.gender, patients.patient_image ";
                                    $query .= " FROM history LEFT JOIN patients ON history.patient_id = patients.id WHERE patients.id = '{$p_id}'";

                                    $select_serial_query = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_serial_query)) {

                                        $visit_no = $row['visit_no'];
                                        $patient_id = $row['patient_id'];
                                        $date = $row['date'];
                                        $first_name = $row['first_name'];
                                        $last_name = $row['last_name'];
                                        $age = $row['age'];
                                        $gender = $row['gender'];
                                        $patient_image = $row['patient_image'];
                                    }
                                }
                        ?>

                        <table class="table table-responsive">
                            <caption><h3>Patient Information</h3></caption>
                            <thead>
                                <th>Patient Id</th>
                                <th>Visit no</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                            </thead>
                            <tr>
                                <td><?php echo $patient_id;?></td>
                                <td><?php echo $visit_no;?></td>
                                <td class="text-capitalize"><?php echo $first_name . " " .$last_name;?></td>
                                <td><?php echo $age?></td>
                                <td class="text-capitalize"><?php echo $gender?></td>
                            </tr>
                            <?php } ?>
                        </table>

                        <table class="table table-responsive">
                            <caption><h3>Pharmacy Order</h3></caption>
                            <thead>
                                <tr>
                                    <th>Generic Name</th>
                                    <th>Instruction</th>
                                    <th>No. of days</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "select * from prescription where patient_id = '{$p_id}' AND visit_no = '{$visit_no}'";
                                $select_query = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($select_query)){
                                    $generic_name = $row['generic_name'];
                                    $instruction = $row['instruction'];
                                    $days = $row['days'];
                            ?>
                                <tr>
                                    <td><?php echo $generic_name?></td>
                                    <td><?php echo $instruction?></td>
                                    <td><?php echo $days?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <div class="prescribed-by">
                            <table class="table table-responsive">
                                <caption><h3>Doctor's Information</h3></caption>

                            <?php
                                $q = "select * from doctor where id = 1";
                                $select_query = mysqli_query($connection,$q);
                                while($row = mysqli_fetch_assoc($select_query)){
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $facebook_id = $row['facebook_id'];
                            ?>

                                <tr>
                                    <td>Name:</td>
                                    <td><?php echo $name?></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo $email?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $phone?></td>
                                </tr>
                                <tr>
                                    <td>Facebook Id</td>
                                    <td><?php echo $facebook_id?></td>
                                </tr>
                            <?php
                                }
                                if(!$select_query){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                ?>
                            </table>

                            <p><a href="" target="_blank" onclick="window.print();" class="btn btn-warning">Print</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include "doctor_footer.php"?>