<?php

function getTransactionId($amount){

    $ch = curl_init();

    $id = uniqid();

    curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.datatrans.com/v1/transactions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"currency\": \"CHF\",\n    \"refno\": \"$id\",\n    \"amount\": $amount,\n    \"autoSettle\": true,\n   \"redirect\": {\n        \"successUrl\": \"https://dyoevents.ch/thankyou.php\",\n        \"cancelUrl\": \"https://dyoevents.ch/shop.php\",\n        \"errorUrl\": \"https://dyoevents.ch/paymenterror.php\"\n    }\n}");
    curl_setopt($ch, CURLOPT_USERPWD, '1100035796' . ':' . 'evIVx36CEWa0LbJu');

    $headers = array();
    $headers[] = 'Content-Type: application/json; charset=UTF-8';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $json = json_decode($result);

    return $json->transactionId;
}

function redirectUserToDataTrans($transId){
    header("Location: https://pay.sandbox.datatrans.com/v1/start/".$transId);
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>