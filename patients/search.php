<?php include "students_header.php"?>
<?php include "students_menu.php"?>

	<section class="body_content container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-3">
					<div class="widget">
						<h3 class="text-capitalize">Hi <?php echo $_SESSION['user_name']; ?>!</h3>
						<?php
                            $student_id = $_SESSION['student_id'];
                            $query = "SELECT * FROM students WHERE student_id = {$student_id}";
                            $select_user_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_user_query)){

                                $student_id = $row['student_id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $user_name = $row['user_name'];
                                $roll_no = $row['roll_no'];
                                $reg_no = $row['reg_no'];
                                $semester = $row['semester'];
                                $user_email = $row['user_email'];
                                $user_password = $row['user_password'];
                                //$user_role = $row['user_role'];
                                $user_image = $row['user_image'];
                                //$user_status = $row['user_status'];
                            }

                            if(!$select_user_query){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        ?>
                        
						<?php
                            echo "<p><img src='images/{$user_image}' class='img-responsive' alt='user_image'></p>";
                        ?>
						<h4 class="text-capitalize"><?php echo $first_name. ' '. $last_name. ' '. $user_name; ?></h4>
						<p>Id: <?php echo $roll_no;?></p>
						<p>Semester: <?php echo $semester;?>th semester</p>
						<p>Email: <?php echo $user_email;?></p>
						<p>Department: CSE</p>
						<p><a href='students_update.php' class='btn btn-primary'>Update</a></p>
					</div>
				</div>
				<div class="col-md-6">
					<?php include "../search.php"; ?>
				</div>
				<div class="col-md-3">
					<?php include "sidebar.php"?>
				</div>
			</div>
		</div>
	</section>
	
	<?php include "students_footer.php"?>