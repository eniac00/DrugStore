<?php
    require_once './config/db.php';  

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // echo $email;

        // email validation 
        if (empty($email)){
            $_SESSION['invalidemail'] = "Field cannot be empty.";
            header("location:/login");
            die();
        }

        // password validation 
        if (empty($password)){
            $_SESSION['invalidpassword'] = "Field cannot be empty.";
            header("location:/login");
            die();
        }

        // sql query here
        $select = "SELECT email, password FROM users where email='$email'";
        $query = mysqli_query($db, $select);

        $assoc = mysqli_fetch_assoc($query);
        
        $db_pass = $assoc['password'];

        if ($db_pass == $password){
            header('location:/'); // <-- should redirect to user index page
        }
        else{
            $_SESSION['invalidpassword'] = "Invalid password";
            header("location:/login");
            die();
        }
        

    } 
    else{
        echo"invalid request method";
    }
?>