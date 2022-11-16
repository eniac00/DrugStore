<!-- session start and db connection-->
<?php 
  require_once './config/db.php';  

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // echo $fname, $lname, $phone, $email, $password;

        // first name validation 
        if (empty($fname)){
            $_SESSION['invalidfirstname'] = "Field cannot be empty.";
            header("location:registration.php");
            die();
        }

        // last name validation 
        if (empty($lname)){
            $_SESSION['invalidlastname'] = "Field cannot be empty.";
            header("location:/registration");
            die();
        }

        // phone validation 
        if (empty($phone)){
            $_SESSION['invalidphone'] = "Field cannot be empty.";
            header("location:/registration");
            die();
        }

        // email validation 
        if (empty($email)){
            $_SESSION['invalidemail'] = "Field cannot be empty.";
            header("location:/registration");   
            die(); 
        }


        // password validation 
        if (empty($password)){
            $_SESSION['invalidpassword'] = "Field cannot be empty.";
            header("location:/registration");
            die();
        }
    
        // sql insert querry here
        $insert = "INSERT INTO users (first_name, last_name, phone, email, password) VALUES ('$fname', '$lname', '$phone', '$email', '$password');";
        mysqli_query($db, $insert);
        header("location:/login");
    } 
    else{
        echo "invalid entry" ;
    }
?>