<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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

    ?>
    <a href="index.php">Back</a>
    <p>
        Loaded in <?php echo $response->time?>
    </p>
    <h4>
        Car: <?php echo $response->result[0]->carname?>
    </h4>
    <h4>
        Extra Info: 
    </h4>
    <p>
        <?php echo $response->result[0]->extrainfo?>
    </p>
    <br>
    <p>
        Email: <?php echo "<a href='mailto:".$response->result[0]->email."'>".$response->result[0]->email."</a>"?>
    </p>
    <p>
        Phone: <?php echo "<a href='tel:".$response->result[0]->phone."'>".$response->result[0]->phone."</a>"?>
    </p>
</body>
</html>