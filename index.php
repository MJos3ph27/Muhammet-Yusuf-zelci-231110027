<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Formu</title>
    <script>
        function validateForm() {
            var email = document.forms["registration"]["email"].value;
            var password = document.forms["registration"]["password"].value;
            var confirmPassword = document.forms["registration"]["confirm_password"].value;
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (email == "" || !emailPattern.test(email)) {
                alert("Geçerli bir e-posta adresi girin.");
                return false;
            }
            if (password == "" || password.length < 6) {
                alert("Şifre en az 6 karakter uzunluğunda olmalıdır.");
                return false;
            }
            if (password != confirmPassword) {
                alert("Şifreler eşleşmiyor.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Kayıt Formu</h2>
    <form name="registration" action="islem.php" onsubmit="return validateForm()" method="post">
        <label for="fname">İsim:</label><br>
        <input type="text" id="fname" name="fname" required><br>
        <label for="lname">Soyisim:</label><br>
        <input type="text" id="lname" name="lname" required><br>
        <label for="email">E-posta adresi:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Şifre:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm_password">Şifre (Tekrar):</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <label for="dob">Doğum Tarihi:</label><br>
        <input type="date" id="dob" name="dob" required><br>
        <label for="gender">Cinsiyet:</label><br>
        <select id="gender" name="gender" required>
            <option value="male">Erkek</option>
            <option value="female">Kadın</option>
            <option value="other">Diğer</option>
        </select><br><br>
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>
