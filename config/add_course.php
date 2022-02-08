<!-- ยังไม่เสร็จ -->

<?php 

    session_start();
    require_once 'db.php';

    if(isset($_POST['submit_course'])){
        $course = $_POST['course'];
        if(empty($course)) {
            $_SESSION['error'] = 'กรุณาเลือกคอร์ส';
            header("location: ../member/select_course.php");
        } else {
            try {

                $check_course = $conn->prepare("SELECT course FROM user WHERE course = :course");
                $check_course->bindParam(":course", $course);
                $check_course->execute();
                $row = $check_course->fetch(PDO::FETCH_ASSOC);
            }
        }

    }




?>