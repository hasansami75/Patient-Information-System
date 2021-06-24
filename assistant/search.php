<?php include "assistant_header.php" ?>
<?php include "assistant_menu.php" ?>

	<section class="body_content container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-3">
					<div class="widget">
						<h3 class="text-capitalize">Hi <?php echo $_SESSION['teacher_name']; ?>...!</h3>
						<?php
                            $teacher_id = $_SESSION['teacher_id'];
                            $query = "SELECT * FROM teacher WHERE teacher_id = {$teacher_id}";
                            $select_user_query = mysqli_query($connection,$query); 

                            while($row = mysqli_fetch_assoc($select_user_query)){

                                $teacher_id = $row['teacher_id'];
                                $teacher_name = $row['teacher_name'];
                                $teacher_designation = $row['teacher_designation'];
                                $teacher_email = $row['teacher_email'];
                                $teacher_image = $row['teacher_image'];
                            }

                            if(!$select_user_query){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        ?>
                        <?php
                            echo "<p><img src='images/{$teacher_image}' class='img-responsive' alt='teacher_image'></p>";
                        ?>
						<h4 class="text-capitalize"><?php echo $teacher_name; ?></h4>
						<p>Designation: <?php echo $teacher_designation;?></p>
						<p>Email: <?php echo $teacher_email;?></p>
						<p>Department: CSE</p>
						<p><a href='assistant_update.php' class='btn btn-primary'>Update</a></p>
					</div>
				</div>
				<div class="col-md-6">
					<?php include "../search.php";?>
				</div>
				<div class="col-md-3">
					<?php include "sidebar.php"?>
				</div>
			</div>
		</div>
	</section>


<?php include "assistant_footer.php" ?>