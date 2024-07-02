<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link REL="SHORTCUT ICON" HREF="./styles/favicon.png">
    <title>Criar Usuario</title>
    <link rel="stylesheet" href="./styles/style.css">
    <meta name="author" content="Eu sou o Goku!">
</head>
<body>
    <?php
        include_once 'connection.php';
        function insert($name, $email, $password){
            $conn = Crud::getConnection();
            $sql = "INSERT INTO CRUDTABLE (nome,email,pass) VALUES (?, ?, ?)";
            $params = array($name, $email, $password);

            $stmt = sqlsrv_query($conn, $sql, $params);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            } else {
                echo '';
            }
        }
        if (isset($_POST['submitButton'])) {
            $name = mb_convert_encoding($_POST['name'], 'UTF-8', 'auto');
            $email = mb_convert_encoding($_POST['email'], 'UTF-8', 'auto');
            $password = mb_convert_encoding($_POST['password'], 'UTF-8', 'auto');
        
            $result = insert($name, $email, $password);
            
            echo "<p>$result</p>";
        }
    ?>
    <div class="main">
        <div class="form">
            <div class="content">
                <form action="" method="post">
                    <img src="./styles/logo.png" alt="LGN">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Sign in" name="submitButton">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
