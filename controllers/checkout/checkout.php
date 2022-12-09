<?php

require_once './config/db.php';

if (isset($_GET['order_id'])) {

    $stmt = $db->prepare("SELECT `fname`, `lname`, `email` FROM `users` WHERE `user_id`=?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
    $stmt->close();

    $fname = $result['fname'];
    $lname = $result['lname'];
    $email = $result['email'];

    $stmt = $db->prepare("SELECT `grand_total` FROM `orders` WHERE `order_id`=?");
    $stmt->bind_param("i", $_GET['order_id']);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
    $stmt->close();

    $grand_total = $result['grand_total'];


    /* PHP */
    $post_data = array();
    $post_data['store_id'] = "wow638f866501bb4";
    $post_data['store_passwd'] = "wow638f866501bb4@ssl";
    $post_data['total_amount'] = $grand_total;
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
    // $post_data['success_url'] = "https://390d-103-222-22-10.ap.ngrok.io/checkout-success";
    // $post_data['fail_url'] = "https://390d-103-222-22-10.ap.ngrok.io/checkout-fail";
    // $post_data['cancel_url'] = "https://390d-103-222-22-10.ap.ngrok.io/checkout-cancel";
    $post_data['success_url'] = "http://localhost:8080/checkout-success";
    $post_data['fail_url'] = "http://localhost:8080/checkout-fail";
    $post_data['cancel_url'] = "http://localhost:8080/checkout-cancel";
    # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

    # EMI INFO
    $post_data['emi_option'] = "1";
    $post_data['emi_max_inst_option'] = "9";
    $post_data['emi_selected_inst'] = "9";

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = $fname . " " . $lname;
    $post_data['cus_email'] = $email;
    $post_data['cus_add1'] = "Dhaka";
    $post_data['cus_add2'] = "Dhaka";
    $post_data['cus_city'] = "Dhaka";
    $post_data['cus_state'] = "Dhaka";
    $post_data['cus_postcode'] = "1000";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = "01711111111";
    $post_data['cus_fax'] = "01711111111";

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = "Store Test";
    $post_data['ship_add1 '] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_country'] = "Bangladesh";

    # OPTIONAL PARAMETERS
    $post_data['value_a'] = $_GET['order_id'];
    $post_data['value_b'] = $_SESSION['user_id'];
    $post_data['value_c'] = $_SESSION['name'];
    $post_data['value_d'] = $_SESSION['is_admin'];

    # CART PARAMETERS
    $post_data['cart'] = json_encode(
        array(
            array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
            array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
            array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
            array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
        )
    );
    $post_data['product_amount'] = "100";
    $post_data['vat'] = "5";
    $post_data['discount_amount'] = "5";
    $post_data['convenience_fee'] = "3";


    # REQUEST SEND TO SSLCOMMERZ
    $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $direct_api_url);
    curl_setopt($handle, CURLOPT_TIMEOUT, 30);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($handle, CURLOPT_POST, 1);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


    $content = curl_exec($handle);

    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if ($code == 200 && !(curl_errno($handle))) {
        curl_close($handle);
        $sslcommerzResponse = $content;
    } else {
        curl_close($handle);
        echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
        exit;
    }

    # PARSE THE JSON RESPONSE
    $sslcz = json_decode($sslcommerzResponse, true);

    if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
        echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
        # header("Location: ". $sslcz['GatewayPageURL']);
        exit;
    } else {
        echo "JSON Data parsing error!";
    }
} else {

    header("location:/customer-orders");
    die();
}
