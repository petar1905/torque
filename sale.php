<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $url = "http://localhost:3000/sql";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
        $userquery = "SELECT * FROM car WHERE id='".$_GET["id"]."'";
        curl_setopt($curl, CURLOPT_POSTFIELDS, $userquery);
 
        $headers = array(
            "NS: torque",
            "DB: torque",
            "Accept: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_USERPWD, "root:root");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
        $response = curl_exec($curl);
        $response = json_decode($response);
        $response = $response[0];
        curl_close($curl);

        var_dump($response)
     ?>
</body>
</html>