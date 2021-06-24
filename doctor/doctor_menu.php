<nav class="navbar navbar-default">
    <!-- after default there can be use .navbar-fixed, .navbar-static(with top or bottom)-->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id=mynav>

            <ul class="nav navbar-nav navbar-right custom-menu">
                <li>
<!--                    <form class="navbar-form" action="search.php" method="post">-->
<!--                        <div class="input-group">-->
<!--                            <input type="text" name="search" class="form-control" placeholder="Search">-->
<!--                            <span class="input-group-btn">-->
<!--                                <button class="btn btn-default search-btn" type="submit" name="submit" >-->
<!--                                    <span class="glyphicon glyphicon-search"></span>-->
<!--                                </button>-->
<!--                            </span>-->
<!--                        </div>-->
<!--                    </form>-->
                </li>
                <li><a href="index.php">Home</a></li>
                <li><a href="my_assistant.php">Assistant Info</a></li>
                <li><a href="my_patients.php">My Patients</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php
                        if(isset($_SESSION['email'])){
                            echo $_SESSION['name'];
                        }
                        ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="text-center"><a href="update_doctor.php">Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="text-center"><a href="../includes/logout.php">Logout</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>