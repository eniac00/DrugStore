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
        $select = "SELECT `user_id`, `first_name`, `password`, `is_admin` FROM users where email='$email'";
        $query = mysqli_query($db, $select);

        $assoc = mysqli_fetch_assoc($query);

        if ($assoc['password'] == $password){
            $_SESSION['user_id'] =  $assoc['user_id'];
            $_SESSION['is_admin'] = $assoc['is_admin'];
            $_SESSION['name'] = $assoc['first_name'];
            if($_SESSION['is_admin'] == 1) {
                header('location:/admin-dashboard');
            } else {
                header('location:/'); // <-- should redirect to user index page
            }
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