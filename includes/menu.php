 <?php session_start();?>
    <nav class="navbar navbar-default">
        <!-- after default there can be use .navbar-fixed, .navbar-static(with top or bottom)-->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            	</button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo" class="img-responsive"></a>
                <h3 class="navbar-text"><a href="index.php">Patient Information System</a></h3>
            </div>

            <div class="collapse navbar-collapse" id=mynav>
                <ul class="nav navbar-nav navbar-right menu">
                    <li><a href="doctor_login.php">Doctor's Panel</a></li>
                    <li><a href="assistant_login.php">Assistant Login</a></li>
                    <li>
                        <form class="navbar-form navbar-right" action="includes/login.php" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                              <input type="email" name="email" class="form-control text-center" id="email" placeholder="Patient Email">
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" class="form-control text-center" id="password" placeholder="********">
                            </div>
                            <input type="submit" name="login" value="Login" class="btn btn-default">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>