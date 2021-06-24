<?php include "assistant_header.php"?>
<?php include "assistant_menu.php"?>
<?php
    $message = " ";
    if(isset($_POST['submit'])){
        $p_id = $_GET['p_id'];
        $visit_no = 1;

        $symptom = $_POST['symptom'];

        $q = "select * from history where patient_id = '{$p_id}'";
        $check_query = mysqli_query($connection, $q);

        while ($row = mysqli_fetch_assoc($check_query)){
            $visit_no = $row['visit_no'];
        }
        $count = mysqli_num_rows($check_query);
        if ($count >=1){
            $visit_no = $visit_no + 1;
        }


        $query = "insert into `history`(`visit_no`, `patient_id`, `symptom`, `date`) ";
        $query .= " values('{$visit_no}','{$p_id}','{$symptom}',now())";
        $insert_query = mysqli_query($connection, $query);

        if(!$insert_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "Referred to Doctor Successfully";
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
                    <h1 class="text-uppercase">Patient Information</h1>
                    <?php
                        if (isset($_GET['p_id'])){
                            $p_id = $_GET['p_id'];
                            $query = "SELECT * FROM patients WHERE id = {$p_id}";
                            $select_patient_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_patient_query)){

                                $id = $row['id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $age = $row['age'];
                                $gender = $row['gender'];
                                $email = $row['email'];
                                $password = $row['password'];
                                $phone = $row['phone'];
                                $patient_image = $row['patient_image'];
                            }

                            if(!$select_patient_query){
                                die("Query Failed" . mysqli_error($connection));
                            }

                        ?>
                    <div class="col-sm-offset-1 col-sm-3 col-md-3 assistant-info">
                        <br>
                        <img src="/pis/patients/images/<?php echo $patient_image;?>" alt="image" class="img-responsive">
                        <br>
                        <table class="table table-responsive table-striped table-hover">
                            <tr>
                                <td>First Name:</td>
                                <td class="text-capitalize"><?php echo $first_name; ?></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td class="text-capitalize"><?php echo $last_name; ?></td>
                            </tr>
                            <tr>
                                <td>Age:</td>
                                <td class="text-capitalize"><?php echo $age; ?></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td class="text-capitalize"><?php echo $gender; ?></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><?php echo $phone ?></td>
                            </tr>
                        </table>
                        <?php }?>
                    </div>
                    <div class="col-sm-1"></div>

                    <div class="col-sm-3 col-md-3">
                        <div class="ask_symptom">
                            <h3>Ask Symptom</h3>
                            <form action="ask_symptom.php?p_id=<?php echo $p_id ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <textarea name="symptom" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-custom" name="submit" value="Submit">
                                </div>
                            </form>
                            <p><?php echo $message ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include "assistant_footer.php"?>