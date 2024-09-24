<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

   <title>Log</title>
</head>

<body>


   <form method="post" action="../Controllers/loginCheckController.php">
      <pre>
                <h1>Login page</h1>
       ID:   <input type="text" name="id"><br>
       Pass: <input type="password" name="pass"><br>
       
                    <button>Login</button>
      </pre>
   </form>


   <?php
   if (isset($_SESSION['error'])) {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
   }
   ?>
</body>

</html>