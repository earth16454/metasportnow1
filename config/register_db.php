<?php

session_start();
require_once 'db.php';
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $birthday = $_POST['birthday'];
    $tel = $_POST['tel'];
    $sex = $_POST['sex'];
    $urole = 'user';

    if (empty($firstname)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อ';
        header("location: ../register.php");
    } else if (empty($lastname)) {
        $_SESSION['error'] = 'กรุณากรอกนามสกุล';
        header("location: ../register.php");
    } else if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: ../register.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: ../register.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอก password';
        header("location: ../register.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'password ต้องมีความยาวมากกว่า 5 ถึง 20 ตัวอักษร';
        header("location: ../register.php");
    } else if (empty($c_password)) {
        $_SESSION['error'] = 'กรุณายืนยัน password';
        header("location: ../register.php");
    } else if ($password != $c_password) {
        $_SESSION['error'] = 'password ไม่ตรงกัน';
        header("location: ../register.php");
    } else if (empty($birthday)) {
        $_SESSION['error'] = 'กรุณากรอกวันเดือนปีเกิด';
        header("location: ../register.php");
    } else if (empty($tel)) {
        $_SESSION['error'] = 'กรุณากรอกเบอร์โทรศัพท์';
        header("location: ../register.php");
    } else if (strlen($_POST['tel']) < 10) {
        $_SESSION['error'] = 'กรุณาระบุเบอร์โทรศัพท์ที่ถูกต้อง';
        header("location: ../register.php");
    } else if (empty($tel)) {
        $_SESSION['error'] = 'กรุณาเลือกเพศ';
        header("location: ../register.php");
    } else {
        try {

            $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if ($row['email'] == $email) {
                $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='../login.php'>คลิ๊กที่นี่เพื่อนเข้าสู่ระบบ</a>";
                header("location: ../register.php");
            } else if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, birthday, tel, sex, urole) 
                                        VALUE(:firstname, :lastname, :email, :password, :birthday, :tel, :sex, :urole)");
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":birthday", $birthday);
                $stmt->bindParam(":tel", $tel);
                $stmt->bindParam(":sex", $sex);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();
                $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='../login.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                header("location: ../register.php");
            } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: ../register.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>