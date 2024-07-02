<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link REL="SHORTCUT ICON" HREF="./styles/favicon.png">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/style.css">
    <meta name="author" content="Eu sou o Goku!">
</head>
<body>
    <?php
        include_once 'connection.php';
        function login($email, $password){
            $conn = Crud::getConnection();
            $sql ="
                SELECT 1
                FROM CRUDTABLE
                WHERE nome = ?
                AND pass = ?
            ";
            $params = array($email, $password);

            $stmt = sqlsrv_query($conn, $sql, $params);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            } else {
                echo '';
            }
        }
        if (isset($_POST['submitButton'])) {
            $email = mb_convert_encoding($_POST['email'], 'UTF-8', 'auto');
            $password = mb_convert_encoding($_POST['password'], 'UTF-8', 'auto');
        
            $result = login($email, $password);
            
            echo "<p>funcionou</p>";
        }
    ?>
    <div class="main">
        <div class="form">
            <div class="content">
                <form action="" method="post">
                    <img src="./styles/logo.png" alt="LGN">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Sign in" name="submitButton">
                </form>
            </div>
        </div>
    </div>
</body>
</html>