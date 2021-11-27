<?php
class Teacher{
    protected $conn;

    function __construct($conn){
        $this->conn = $conn;
    }

    public function loginTeacher($email, $password)
    {
        $query = "SELECT * FROM buddy_teachers WHERE email=:email OR phoneNumber=:phoneNumber";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phoneNumber', $email, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $passwordCheck = password_verify($password, $row['Tpassword']);
        if ($passwordCheck == false)
            return false;
        else {
            session_start();
            $_SESSION['teacher_id'] = $row['teacher_id'];
            header("Location: teacher/home.php");
            exit();
        }
    }

    public function TeacherData($teacher_id)
    {
        $query = "SELECT * from buddy_teachers WHERE teacher_id=:teacherid";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':teacherid', $teacher_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function  loggedInTeacher()
    {
        return (isset($_SESSION['teacher_id'])) ? true : false;
    }


    public function checkTeacher($email)
    {
        $query = "SELECT email , phoneNumber FROM buddy_teachers WHERE email=:email OR phoneNumber=:phoneNumber";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phoneNumber', $email, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>