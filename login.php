<?php
session_start();

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];

        switch ($user['role']) {
            case 'seller':
                header('Location: seller_dashboard.php');
                break;
            case 'buyer':
                header('Location: buyer_dashboard.php'); //could really insert a blank page like coming soon for these
                break;
            case 'admin':
                header('Location: admin_dashboard.php');
                break;
            default:

                break;
        }
    } else {
        echo "Invalid email or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="homesite.css">
</head>

<body>

    <div class="login-container">
        <h2>User Login</h2>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>
