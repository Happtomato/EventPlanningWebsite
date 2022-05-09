<?php

function getTransactionId($amount){

    $ch = curl_init();

    $id = uniqid();
    curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.datatrans.com/v1/transactions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"currency\": \"CHF\",\n    \"refno\": \"$id\",\n    \"amount\": $amount,\n    \"paymentMethods\": [\"ECA\",\"VIS\",\"MAU\",\"TWI\",\"APL\"]\n    \"redirect\": {\n        \"successUrl\": \"https://pay.sandbox.datatrans.com/upp/merchant/successPage.jsp\",\n        \"cancelUrl\": \"https://pay.sandbox.datatrans.com/upp/merchant/cancelPage.jsp\",\n        \"errorUrl\": \"https://pay.sandbox.datatrans.com/upp/merchant/errorPage.jsp\"\n    }\n}");
    curl_setopt($ch, CURLOPT_USERPWD, '{100000}' . ':' . '{tgnHbZgxJB8bsKb}');

    $headers = array();
    $headers[] = 'Content-Type: application/json; charset=UTF-8';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);


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