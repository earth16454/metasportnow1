<?php

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'metasportnew1');

    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($firstname, $lastname, $nickname, $birthday, $sex, $tel, $subject){
            $result = mysqli_query($this->dbcon, "INSERT INTO trainer(trainer_firstname, trainer_lastname, 
                            trainer_nickname, trainer_birthday, trainer_sex, trainer_tel, trainer_subject) VALUES(
                            '$firstname','$lastname','$nickname','$birthday','$sex','$tel','$subject')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM trainer");
            return $result;
        }

        public function fetchonerecord($trainerid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM trainer WHERE trainer_id = '$trainerid'");
            return $result;
        }

        public function update($firstname, $lastname, $nickname, $birthday, $sex, $tel, $subject, $trainerid){
            $result = mysqli_query($this->dbcon, "UPDATE trainer SET 
                trainer_firstname = '$firstname',
                trainer_lastname = '$lastname',
                trainer_nickname = '$nickname',
                trainer_birthday = '$birthday',
                trainer_sex = '$sex',
                trainer_tel = '$tel',
                trainer_subject = '$subject',
                WHERE trainer_id = '$trainerid'
            ");
            return $result;
        }

        public function delete($trainerid){
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM trainer WHERE trainer_id = '$trainerid'");
            return $deleterecord;
        }
    }

?>