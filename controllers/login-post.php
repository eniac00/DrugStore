<?php
require_once './config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email;

    // email validation 
    if (empty($email)) {
        $_SESSION['invalidemail'] = "Field cannot be empty.";
        header("location:/login");
        die();
    }

    // password validation 
    if (empty($password)) {
        $_SESSION['invalidpassword'] = "Field cannot be empty.";
        header("location:/login");
        die();
    }

    //admin check

    $stmt = $db->prepare("SELECT * FROM `users` INNER JOIN `admins` ON `users`.`user_id`=`admins`.`admin_id` AND `users`.`email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($user['password'] === $password) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['fname'];
            $_SESSION['is_admin'] = 1;
            $stmt->close();
            header('location:/admin-dashboard');
        } else {
            $_SESSION['invalidpassword'] = "Invalid password";
            $stmt->close();
            header("location:/login");
            die();
        }
    }

    $stmt->close();

    //admin check finished

    //customer check 

    $stmt = $db->prepare("SELECT * FROM `users` INNER JOIN `customers` ON `users`.`user_id`=`customers`.`customer_id` AND `users`.`email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($user['password'] === $password) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['fname'];
            $_SESSION['is_admin'] = 0;
            $stmt->close();
            header('location:/');
        } else {
            $_SESSION['invalidpassword'] = "Invalid password";
            $stmt->close();
            header("location:/login");
            die();
        }
    }

    $stmt->close();

    //customer check finished

    header("location:/login?nouser=1");
    die();
}
