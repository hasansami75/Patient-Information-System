<?php include "../includes/db.php" ?>
<?php include "../includes/header.php" ?>
<?php include "../functions.php" ?>

<?php
    if (isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];

        $q = "SELECT * FROM serial where patient_id = '{$p_id}'";
        $check_query = mysqli_query($connection, $q);

        $count = mysqli_num_rows($check_query);

        if ($count >= 1){
            reDirect("index.php");
        }
        else{

            $query = "INSERT INTO `serial`(`patient_id`, `date`)";
            $query .= " VALUES('{$p_id}', now())";

            $register_query = mysqli_query($connection,$query);

            if(!$register_query){
                die("Query Failed". mysqli_error());
            }
            else{
                reDirect("index.php");
            }
        }
    }
?>