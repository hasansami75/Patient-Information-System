<?php include "patients_header.php"?>
<?php include "patients_menu.php"?>

<section class="body_content container-fluid">
    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="history">
                <h1 class="text-uppercase">Prescription Information</h1>
                <div class="col-sm-offset-3 col-sm-4 col-md-4">

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
                            if(isset($_GET['v_id'])){
                                $visit_no = $_GET['v_id'];
                                $p_id = $_SESSION['id'];

                                $query = "select * from prescription where patient_id = '{$p_id}' and visit_no = '{$visit_no}'";
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
                        <?php }}?>
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

<?php include "patients_footer.php"?>