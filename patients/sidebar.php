<div class="widget">
						<h3>Departments</h3>
						<ul>
							<li><a href="">Computer Science and Engineering</a></li>
							<li><a href="">Information and Communication Technology</a></li>
							<li><a href="">Mathematics</a></li>
							<li><a href="">Statistics</a></li>
							<li><a href="">Physics</a></li>
							<li><a href="">Pharmacy</a></li>
						</ul>
					</div>
					<div class="widget">
						<h3>Semester</h3>
						<ul>
                            <?php
                                for($i=1;$i<=8;$i++){
                                    $semester = $i;
                            ?>
                            <li><?php echo "<a href='all_semester.php?s_id=$semester'>Semester $semester</a>"?>
                            </li>
                            <?php } ?>
                        </ul>
					</div>
					<div class="widget">
						<h3>Latest Posts</h3>
						<?php

                            $query = "SELECT posts.post_id, posts.post_course_id, posts.post_title, posts.post_author, posts.post_date, posts.post_content, posts.post_file,";
                            $query .= " courses.c_id, courses.course_title, courses.semester";
                            $query .= " FROM posts LEFT JOIN courses ON posts.post_course_id = courses.c_id WHERE courses.semester = '{$semester}' ORDER BY posts.post_id DESC LIMIT 5";
                        
                            $select_post_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_post_query)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                //$post_author = $row['post_author'];
                        ?>
						<?php  echo" <p class='text-capitalize'><span class='glyphicon glyphicon-tags'>&nbsp;</span> <a href='post_by_id.php?p_id=$post_id'>$post_title</a></p>"?>
						<?php } ?>
					</div>