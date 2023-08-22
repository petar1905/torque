<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
        $url = "http://localhost:3000/sql";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $userquery = "SELECT * FROM car ORDER BY RAND()";
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
    <nav>
        <a href="newsale.php">New Sale</a>
        <form action="search.php" method="get">
            <input type="text" placeholder="Search" name="q">
            <input type="submit">
        </form>
    </nav>
    <main>
        <p>
            Loaded in <?php echo $response->time?>
        </p>

        <h1>
            Listings
            <?php 
                $listings = $response->result;
                //var_dump($listings);
                foreach ($listings as $listing) {
                    echo "<a href='/sale.php?id=".$listing->id."'><h1>".$listing->carname."</h1></a>";
                }
            ?>
        </h1>
    </main>
</body>
</html>