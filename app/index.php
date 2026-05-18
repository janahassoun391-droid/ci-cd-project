<?php

$conn = new mysqli("localhost", "root", "password", "recommender");
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
        $resultText = $row["recommendation"];
    } else {
        $resultText = "No recommendation found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recommendation System</title>
</head>
<body>

<h2>my Recommendation System</h2>

<form method="POST">
    <input type="text" name="input" placeholder="Enter keyword (hot, food...)">
    <button type="submit">Get Recommendation</button>
</form>

<br>

<?php
if ($resultText != "") {
    echo "<h3>Result: " . $resultText . "</h3>";
}
?>

</body>
</html>
