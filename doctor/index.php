<?php include "doctor_header.php"?>
<?php include "doctor_menu.php"?>

    <section class="body_content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <?php include "left_sidebar.php"?>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10">
                <div class="history">
                    <h1 class="text-uppercase">Serials</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Patient Name</th>
                                <th>Give Prescription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

//                                $query = "SELECT history.id, history.visit_no, history.patient_id, history.symptom, history.date,";
                            //                                $query .= "serial.serial_id, serial.patient_id, patients.id, patients.first_name, patients.last_name ";
                            //                                $query .= " FROM history LEFT JOIN serial ON serial.patient_id = history.patient_id LEFT JOIN patients ON history.patient_id = patients.id";

                                $query = "SELECT * from serial";
                                $select_serial_query = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_serial_query)){

                                    $serial_id = $row['serial_id'];
                                    $patient_id = $row['patient_id'];

                                    $query = "SELECT * from patients where  id='$patient_id'";
                                    $select_patient_query = mysqli_query($connection, $query);

                                    while($row1 = mysqli_fetch_assoc($select_patient_query)){

                                        $first_name = $row1['first_name'];
                                        $last_name = $row1['last_name'];
                                    }

                                    //$history_id = $row['id'];
                                    //$visit_no = $row['visit_no'];
//                                    $patient_id = $row['patient_id'];
                                    //$symptom = $row['symptom'];


                                if (!empty($serial_id)){
                            ?>
                                    <tr>
                                        <td><?php echo $serial_id ?></td>
                                        <td><?php echo $first_name." ".$last_name ?></td>
                                        <td><a href="prescription.php?p_id=<?php echo $patient_id ?>" class="btn btn-info btn-sm">Open</a></td>
                                    </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


<?php include "doctor_footer.php"?>