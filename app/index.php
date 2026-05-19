<?php

$conn = new mysqli("db", "root", "password", "recommender");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$resultText = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"];

    $sql = "SELECT recommendation FROM items WHERE keyword='$input'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $resultText = "Recommendation: " . $row["recommendation"];
    } else {
        $resultText = "No recommendation found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Recommender</title>
</head>
<body>

<h2>Smart Recommendation System</h2>

<form method="POST">
    <input type="text" name="input" placeholder="Enter keyword">
    <button type="submit">Get Recommendation</button>
</form>

<p><?php echo $resultText; ?></p>

</body>
</html>
