<?php
require_once('../Models/alldb.php');
session_start();
$res = data($_SESSION['id']);
$r = $res->fetch_assoc()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee|Portal</title>
</head>

<body>
    <h1>Employee page</h1>
    Welcome, <?php echo $r['Name']; ?>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
        </tr>

        <tr>
            <td><?php echo $r['ID']; ?></td>
            <td><?php echo $r['Name']; ?></td>
            <td><?php echo $r['Email']; ?></td>
            <td> <?php
                    if (!empty($r['Updated_Salary'])) {
                        echo $r['Updated_Salary'];
                    } else {
                        echo $r['Salary'];
                    }
                    ?> </td>
        </tr>

    </table>

    <?php
    if (isset($_SESSION['mes'])) {
        echo $_SESSION['mes'];
        unset($_SESSION['mes']);
    }
    ?>

    <form action="../Controllers/loginCheckController.php">
        <button name="logout">Logout</button>
    </form>


</body>

</html>