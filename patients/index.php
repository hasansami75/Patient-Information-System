<?php include "patients_header.php"?>
<?php include "patients_menu.php"?>

	<section class="body_content container-fluid">
		<div class="row">
			    <div class="col-sm-4 col-md-3 col-lg-2">
					<?php include "left_sidebar.php"?>
				</div>
				<div class="col-sm-4 col-md-9 col-lg-10">
				    <div class="history">
                        <h1 class="text-uppercase">My History</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Visit Number</th>
                                    <th>Symptom</th>
                                    <th>Date</th>
                                    <th>Prescription</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id = $_SESSION['id'];
                                    $query = "SELECT * FROM history WHERE patient_id = {$id}";
                                    $select_user_query = mysqli_query($connection,$query);

                                    while($row = mysqli_fetch_assoc($select_user_query)){

                                        $visit_no = $row['visit_no'];
                                        $symptom = $row['symptom'];
                                        $date = $row['date'];

                                ?>
                                <tr>
                                    <td><?php echo $visit_no ?></td>
                                    <td><?php echo $symptom ?></td>
                                    <td><?php echo $date ?></td>
                                    <td><a href="prescription.php?v_id=<?php echo $visit_no ?>" class="btn btn-sm btn-info">Open</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
				</div>
		</div>
	</section>


<?php include "patients_footer.php"?>