<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Users</title>
</head>
<body>
    <h1>List of Users</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        
        <!-- list all users -->
        <?php
            require_once('../controllers/UserController.php');
            $controller = new UserController();

            foreach($controller->get_data() as $res){
                echo '<tr>';
                echo '<td>' . $res->get_id() . '</td>';
                echo '<td>' . $res->get_name() . '</td>';
                echo '</tr>';
            }            
        ?>
    </table>
</body>
</html>