<?php include "doctor_header.php"?>
<?php include "doctor_menu.php"?>


    <section class="body_content container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2">
                <?php include "left_sidebar.php" ?>
            </div>
            <div class="col-md-9">
                <div class="history">
                    <h1 class="text-uppercase">Patients Information</h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Visit No.</th>
                            <th>Symptoms</th>
                            <th>Date</th>
                            <th>Prescription</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET['patient_id'])){
                                    $patient_id = $_GET['patient_id'];

                                    $query = "SELECT patients.id, patients.first_name, patients.last_name, ";
                                    $query .= "history.visit_no, history.patient_id, history.symptom, history.date ";
                                    $query .= "FROM patients LEFT JOIN history ON patients.id = history.patient_id WHERE patients.id = '{$patient_id}'";
                                    $select_patient_query = mysqli_query($connection,$query);

                                    $count = mysqli_num_rows($select_patient_query);

                                    while($row = mysqli_fetch_assoc($select_patient_query)) {
                                        $id = $row['id'];
                                        $first_name = $row['first_name'];
                                        $last_name = $row['last_name'];
                                        $visit_no = $row['visit_no'];
                                        $symptom = $row['symptom'];
                                        $date = $row['date'];

                                    if(!$select_patient_query){
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                            ?>
                            <tr>
                                <td><?php echo $visit_no?></td>
                                <td><?php echo $symptom?></td>
                                <td><?php echo $date?></td>
                                <td><a href="print_prescription.php?p_id=<?php echo $patient_id?>&v_id=<?php echo $visit_no ?>" class="btn btn-sm btn-warning">Prescription</a></td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


<?php include "doctor_footer.php"?>