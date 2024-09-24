<?php
require_once('../Models/alldb.php');
session_start();
if (empty($_SESSION['id'])) {
    header("location:../Views/login.php");
}
$res = data2();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
</head>

<body>
    <h1>Home page</h1>
    Welcome, <?php echo $_SESSION['id']; ?>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Increment</th>
            <th>Updated Salary</th>
            <th colspan="2">Options</th>
        </tr>
        <?php while ($r = $res->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $r['ID']; ?></td>
                <td><?php echo $r['Name']; ?></td>
                <td><?php echo $r['Email']; ?></td>
                <td><?php echo $r['Salary']; ?></td>


                <form action="../Controllers/updateIncrementController.php" method="post">
                    <td>
                        <input type="number" name="increment" value="<?php echo $r['Increment']; ?>" min="0" required>
                        <input type="hidden" name="id" value="<?php echo $r['ID']; ?>">
                    </td>
                    <td><?php echo $r['Updated_Salary']; ?></td>
                    <td>
                        <button type="submit" name="update">Generate</button>
                    </td>
                </form>


                <form action="../Controllers/homeController.php" method="get">
                    <td><button name="delete" value="<?php echo $r['ID']; ?>">Delete</button></td>
                </form>
            </tr>
        <?php } ?>
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

    <br><br>

    <form action="../Controllers/insertDataController.php">
        <button name="insert">Insert Data</button>
    </form>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }
    ?>
</body>

</html>