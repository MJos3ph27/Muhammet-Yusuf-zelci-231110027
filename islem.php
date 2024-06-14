<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    // E-posta benzersizliğini kontrol et (Veritabanı bağlantısı burada gereklidir)
    // Şifre eşleşmesini kontrol et
    if ($password !== $confirm_password) {
        die("Şifreler eşleşmiyor.");
    }

    // Şifreyi hashleyin
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Veritabanına bağlanma
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "user_registration";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // E-posta benzersizliğini kontrol etme
    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        die("Bu e-posta adresi zaten kayıtlı.");
    }

    // Verileri veritabanına ekleme
    $sql = "INSERT INTO users (fname, lname, email, password, dob, gender)
            VALUES ('$fname', '$lname', '$email', '$hashed_password', '$dob', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Kayıt başarılı!";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
