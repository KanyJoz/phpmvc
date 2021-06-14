<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Advertisements</title>
</head>
<body>
    <h1>List of Advertisements</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Title</th>
        </tr>

            <!-- list all ads with usernames -->
            <?php
            require_once('../controllers/AdvertisementController.php');
            $controller = new AdvertisementController();
            $data = $controller->get_data();
            $usernames = $controller->get_usernames();


            for($i = 0; $i < count($data); $i++) {
                echo '<tr>';
                echo '<td>' . $data[$i]->get_id() . '</td>';
                echo '<td>' . $usernames[$i] . '</td>';
                echo '<td>' . $data[$i]->get_title() . '</td>';
                echo '</tr>';
            }         
        ?>
</body>
</html>