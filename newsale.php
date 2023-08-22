<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Sale</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $url = "http://localhost:3000/sql";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $userquery = "CREATE car SET carname='". $_POST["carname"] . "'";
            $userquery = $userquery . ",email='" . $_POST["email"] . "'";
            $userquery = $userquery . ",phone='" . $_POST["phone"] . "'";
            $userquery = $userquery . ",extrainfo='" . $_POST["extrainfo"] . "'";

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
            echo $response;
        }
    ?>
    <section id="form-container">
        <div class="spacer"></div>
        <form action="newsale.php" method="post" id="saleform">
            <table>
                <tr>
                    <td style="text-align: center;">
                        <a href="index.php">Back</a>
                    </td>
                    <th>
                        <label for="saleform">New Sale</label>
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for="carname">Car Name</label>
                    </th>
                    <td>
                        <input type="text" name="carname" id="carname" required placeholder="Car Name">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="email">Seller E-mail</label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" required placeholder="E-mail Address">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="phone">Seller Phone Number</label>
                    </th>
                    <td>
                        <input type="tel" name="phone" id="phone" required placeholder="Phone Number">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="extrainfo">Extra Information</label>
                    </th>
                    <td>
                        <textarea name="extrainfo" id="extrainfo" cols="29" rows="10" 
                        placeholder="Extra Information"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit">
                    </td>
                </tr>
            </table>
        </form>
        <div class="spacer"></div>
    </section>
</body>
</html>