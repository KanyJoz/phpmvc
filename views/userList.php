<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User List</h1>
    <table border=1 class="center">
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