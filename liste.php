<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$sql = "SELECT id, fname, lname, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>İsim</th><th>Soyisim</th><th>E-posta</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>" . $row["email"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 sonuç";
}

$conn->close();
?>
