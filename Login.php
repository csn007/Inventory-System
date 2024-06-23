<?php

    session_start();
    if(isset($_SESSION['user'])) header('location: Dashboard.php ');

    $error_message = '';

    if($_POST){
        include('database/connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = 'SELECT * FROM user WHERE user.email="' . $username . '" AND user.password="'. $password .'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();


        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;

            header('Location: Dashboard.php');

        }else $error_message = 'Please make sure that username and password are correct.';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>IMS Login - Inventory Management System</title>

        <link rel="stylesheet"type="text/css" href="css/login.css">
    </head>
    <body id="loginbody">
        <?php if(!empty($error_message)) { ?>
            <div id="errorMessage">
                <strong>ERROR:</strong></p><?= $error_message ?> </p>
            </div>
        <?php } ?>
       
        <div class="container">
            <div class="login-header">
                <h1>FALCON</h1>
                <h3>Inventory Management System</h3>
            </div>
            <div class="login-body">
                <form action="Login.php" method = "POST">
                    <div class="login-input-container">
                        <label for="">Username</label>
                        <input placeholder ="Username" name= "username" type="text"  />
                    </div>
                    <div class="login-input-container">
                        <label for="">Password</label>
                        <input placeholder="Password" name= "password" type="password"  />
                    </div>
                    <div class="login-button-container">
                        <button>Login</button>
                    </div>
                </form>

            </div>
        </div>

    </body>
</html>