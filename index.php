<?php
    // obrada Login funkcije
    require 'dbBroker.php';
    require 'model/user.php';

    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username_forma = $_POST['username'];
        // echo $username_forma;
        $password_forma = $_POST['password'];
        $id_forma = 1;

        $user = new User($id_forma, $username_forma, $password_forma);
        $result = User::logIn($user, $conn);

        // echo json_encode($result);

        if($result->num_rows == 1) {
            $_SESSION['user_id'] = $user->id;
            header('Location: home.php');
            exit();
        }
        else {
            echo "Neuspesno logovanje";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FON: Zakazivanje kolokvijuma</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="login-form">
        <div class="main-div card shadow-lg p-4">
            <h2 class="text-center">Prijava</h2>
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="username">Korisničko ime</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4" name="submit">Prijavi se</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
