<?php

    session_start();
    require_once 'db.php';
    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)){
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: login.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: login.php");
        } else if (empty($password)){
            $_SESSION['error'] = 'กรุณากรอก password';
            header("location: login.php");
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if($email == $row['email']){
                        if(password_verify($password, $row['password'])){ // ถ้ารหัสผ่านถูก
                            if ($row['urole'] == 'admin'){
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: ../admin/index.php"); // รอแก้ตรงนี้
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: ../member/profile.php");
                            }
                        } else {
                            $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง';
                            header("location: ../login.php");
                        }
                    } else {
                        $_SESSION['error'] = 'อีเมลไม่ถูกต้อง';
                        header("location: ../login.php");
                    }

                } else {
                    $_SESSION['error'] = "ไม่มีข้อมูลในระบบ, กรุณาสมัครสมาชิก";
                    header("location: ../login.php");
                }

            } catch(PDOException $e){
                echo $e -> getMessage();
            }
        }
    }

?>