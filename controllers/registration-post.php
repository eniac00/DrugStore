<!-- session start and db connection-->
<?php
require_once './config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $fname, $lname, $phone, $email, $password;

    // first name validation 
    if (empty($fname)) {
        $_SESSION['invalidfirstname'] = "Field cannot be empty.";
        header("location:registration.php");
        die();
    }

    // last name validation 
    if (empty($lname)) {
        $_SESSION['invalidlastname'] = "Field cannot be empty.";
        header("location:/registration");
        die();
    }

    // phone validation 
    if (empty($phone)) {
        $_SESSION['invalidphone'] = "Field cannot be empty.";
        header("location:/registration");
        die();
    }

    // email validation 
    if (empty($email)) {
        $_SESSION['invalidemail'] = "Field cannot be empty.";
        header("location:/registration");
        die();
    }


    // password validation 
    if (empty($password)) {
        $_SESSION['invalidpassword'] = "Field cannot be empty.";
        header("location:/registration");
        die();
    }

    $stmt = $db->prepare("INSERT INTO `users` (`fname`, `lname`, `email`, `phone`, `password`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $email, $phone, $password);

    try {
        $stmt->execute();
        $user_id = $stmt->insert_id;
        $stmt->close();

        // rerunning stmt to insert into the customers table
        $stmt = $db->prepare("INSERT INTO `customers` (`customer_id`) VALUES (?)");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();

        header("location:/login");
        die();

    } catch (Exception $e) {
        if ($e->getCode() === 1062) {
            $_SESSION['duplicate'] = "Someone else has the same email.";
            header("location:/registration");
            die();
        }
    }
} else {
    echo "invalid entry";
}
?>