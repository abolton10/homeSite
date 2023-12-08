<?php
include('db.php');

$registrationMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        $registrationMessage = "Registration successful!";
        
        header("Location: login.php");
        exit(); 
    } else {
        $registrationMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="homesite.css">
</head>

<body>

    <div class="signup-container">
        <h2>User Registration</h2>
        <form action="registration.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        // Display pop-up message if registration is successful
        <?php if (!empty($registrationMessage)) : ?>
            alert("<?php echo $registrationMessage; ?>");
        <?php endif; ?>
    </script>

</body>

</html>
