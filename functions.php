<?php
//    //escape function for security
//    function escape($string){
//        global $connection;
//        return mysqli_real_escape_string($connection, trim(strip_tags($string)));
//    }

    //To redirect the page
    function reDirect($location){
       return header("Location: ". $location);
    }

    //confirm query
    function confirmQuery($result){
        global $connection;

        if(!$result){
            die("Query Failed". mysqli_error());
        }
    }
//    patients login
    function userLogin($email, $password){
        global $connection;
        $email = trim($email);
        $password = trim($password);

        $query = "SELECT * FROM patients WHERE email = '{$email}'";
        $select_patient_query = mysqli_query($connection, $query);

        if(!$select_patient_query){
            die("Query Failed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_patient_query)){
            $db_id = $row['id'];
            $db_first_name = $row['first_name'];
            $db_last_name = $row['last_name'];
            $db_email = $row['email'];
            $db_password = $row['password'];
//            $db_patient_image = $row['patient_image'];
            
        }

        //$user_password = crypt($user_password, $db_user_password);

        if($password == $db_password){
            $_SESSION['id'] = $db_id;
            $_SESSION['email'] = $db_email;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name;
            $_SESSION['email'] = $db_email;
            $_SESSION['password'] = $db_password;

            reDirect("/pis/patients/index.php");
        }
        else{
            reDirect("/pis/index.php");
        }
    }

//admin login
    function doctorLogin($email, $password){
        global $connection;
        $email = trim($email);
        $password = trim($password);

        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM doctor WHERE email = '{$email}'";
        $select_doctor_query = mysqli_query($connection, $query);

        if(!$select_doctor_query){
            die("Query Failed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_doctor_query)){
            $db_id = $row['id'];
            $db_email = $row['email'];
            $db_name = $row['name'];
            $db_password = $row['password'];
        }

        //$user_password = crypt($user_password, $db_user_password);

        if(($password == $db_password) && ($email == $db_email)){
            $_SESSION['id'] = $db_id;
            $_SESSION['email'] = $db_email;
            $_SESSION['name'] = $db_name;

            reDirect("/pis/doctor/index.php");
        }
        else{
            reDirect("/pis/doctor_login.php");
        }
    }
//teacher login
    function assistantLogin($email, $password){
        global $connection;
        $email = trim($email);
        $password = trim($password);

        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM assistant WHERE email = '{$email}'";
        $select_query = mysqli_query($connection, $query);

        if(!$select_query){
            die("Query Failed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_query)){
            $db_id = $row['id'];
            $db_first_name = $row['first_name'];
            $db_last_name = $row['last_name'];
            $db_email = $row['email'];
            $db_password = $row['password'];
            $db_image = $row['image'];
        }

        if(($password == $db_password) && ($email == $db_email)){
            $_SESSION['id'] = $db_id;
            $_SESSION['email'] = $db_email;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name;

            reDirect("/pis/assistant/index.php");
        }
        else{
            reDirect("/pis/assistant_login.php");
        }
    }
?>
