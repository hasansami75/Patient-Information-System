<?php include "doctor_header.php"?>
<?php include "doctor_menu.php"?>

<?php
    $message = " ";
    if (isset($_POST['submit'])){
        $generic_name = trim($_POST['generic_name']);
        $instruction = trim($_POST['instruction']);
        $days = trim($_POST['days']);
        $p_id = $_GET['p_id'];
        $visit_no = $_GET['v_id'];

        $query = "INSERT INTO `prescription`(`generic_name`, `instruction`, `days`, `patient_id`, `visit_no`) ";
        $query .= "VALUES('{$generic_name}','{$instruction}','{$days}','{$p_id}','{$visit_no}')";

        $register_query = mysqli_query($connection,$query);

        if(!$register_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "Drug has been added successfully to prescription.";
        }
    }
?>

    <section class="body_content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <?php include "left_sidebar.php"?>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10">
                <div class="history">
                    <h1 class="text-uppercase">Prescription Information</h1>
                    <div class="col-sm-3">
                        <?php
                            if (isset($_GET['p_id'])){
                                $p_id = $_GET['p_id'];


                                $query = "SELECT history.id, history.visit_no, history.patient_id, history.symptom, history.date,";
                                $query .= "patients.id, patients.first_name, patients.last_name, patients.age, patients.gender, patients.patient_image ";
                                $query .= " FROM history LEFT JOIN patients ON history.patient_id = patients.id WHERE patients.id = '{$p_id}'";

                                $select_serial_query = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_serial_query)) {

                                    $history_id = $row['id'];
                                    $visit_no = $row['visit_no'];
                                    $patient_id = $row['patient_id'];
                                    $symptom = $row['symptom'];
                                    $date = $row['date'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $age = $row['age'];
                                    $gender = $row['gender'];
                                    $patient_image = $row['patient_image'];
                                }
                                    ?>
                                    <p><img src="/pis/patients/images/<?php echo $patient_image ?>" alt="image" class="img-responsive"></p>
                                    <table class="table table-responsive">
                                        <tr>
                                            <td>Patient Id :</td>
                                            <td><?php echo $patient_id;?></td>
                                        </tr>
                                        <tr>
                                            <td> Visit no:</td>
                                            <td><?php echo $visit_no;?></td>
                                        </tr>
                                        <tr>
                                            <td>Name :</td>
                                            <td class="text-capitalize"><?php echo $first_name . " " .$last_name;?></td>
                                        </tr>
                                        <tr>
                                            <td>Age :</td>
                                            <td><?php echo $age?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender :</td>
                                            <td class="text-capitalize"><?php echo $gender?></td>
                                        </tr>
                                        <tr>
                                            <td>Symptoms :</td>
                                            <td class="text-capitalize"><?php echo $symptom; ?></td>
                                        </tr>
                                    </table>

                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <h3>Pharmacy Order</h3>
                        <hr>
                        <form action="prescription.php?v_id=<?php echo $visit_no?>&p_id=<?php echo $patient_id ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Generic Name</label>
                                <input type="text" class="form-control"  name="generic_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Instruction</label>
                                <input type="text" class="form-control"  name="instruction" required>
                            </div>
                            <div class="form-group">
                                <label for="">No. of Days</label>
                                <input type="text" class="form-control"  name="days" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"  name="submit" value="Next">
                                <a href="print_prescription.php?p_id=<?php echo $patient_id?>" class="btn btn-warning">Done</a>
                            </div>
                        </form>
                        <p><?php echo $message;?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>


<?php include "doctor_footer.php"?>