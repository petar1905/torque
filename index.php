<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="divider"></div>
        <a href="newsale.php">New Sale</a>
        <form action="search.php" method="get">
            <input type="text" placeholder="Search" name="q">
            <input type="submit">
        </form>
    </nav>
    <?php 
        $url = "http://localhost:3000/sql";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $userquery = "SELECT * FROM car";

        curl_setopt($curl, CURLOPT_POSTFIELDS, $userquery);

        $headers = array(
            "NS: torque",
            "DB: torque",
            "Accept: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_USERPWD, "root:root");
        $response = curl_exec($curl);
        curl_close($curl);
        //$response = json_decode($response);
        echo $response;
    ?>
</body>
</html>