<?php
session_start();

if (!isset($_SESSION['buyer_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['first_login'])) {
    echo "<div class='welcome'>
            <h1>Welcome User</h1>
            <p>Thank you for choosing Home Haven!</p>
          </div>";
}

// connect to property database
$servername = "codd.cs.gsu.edu";
$username = "azumaran1";
$password = "azumaran1";
$dbname = "azumaran1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql ="CREATE TABLE IF NOT EXISTS properties (
    property_id INT PRIMARY KEY AUTO_INCREMENT,
    location VARCHAR(255),
    age INT,
    floor_plan VARCHAR(255),
    square_footage INT,
    bedrooms INT,
    bathrooms INT,
    parking_availability BOOLEAN,
    property_value DECIMAL(10, 2),
    property_tax DECIMAL(10, 2)
)";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buyer Dashboard</title>
        <link rel="stylesheet" href="homesite.css">
    </head>

    <body>
        <header>
            <div>
                <img src="homehavenlogo.png" alt="HomeHaven Logo">
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Buy</a></li>
                        <li><a href="#">Sell</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><input type="text" placeholder="Search.."></li>
                        <!-- TODO Implement search bar and filter database with 2-3 queries -->
                    </ul>
                </nav>
            </div>
        </header>

        <div class="content">
        
        <h2>Your Wishlist</h2>
        <!-- TODO Search Database and display wishlisted properties-->
        </div>
        
        <footer>
            <div>
                <p>Contact Information: info@HomeHaven.com | Phone: (123) 456-7890</p>
                <p>Privacy Policy | Terms of Service</p>
            </div>
        </footer>

    </body>
</html>