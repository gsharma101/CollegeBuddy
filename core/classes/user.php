<?php
class User
{

    protected $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function SignUp($date, $fname, $lname, $email, $sec, $sem, $branch, $college, $password, $phone, $uni_roll)
    {
        $query = "INSERT INTO student_info (register_date,fname,lname,college,branch,section,email,user_password,uni_roll,sem,user_phone) 
        VALUES (:registerDate,:fname,:lname,:college,:branch,:section,:email,:user_password,:uni_roll,:sem,:user_phone)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":registerDate", $date, PDO::PARAM_STR);
        $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
        $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
        $stmt->bindParam(":college", $college, PDO::PARAM_STR);
        $stmt->bindParam(":branch", $branch, PDO::PARAM_STR);
        $stmt->bindParam(":section", $sec, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":user_password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":uni_roll", $uni_roll, PDO::PARAM_INT);
        $stmt->bindParam(":sem", $sem, PDO::PARAM_STR);
        $stmt->bindParam(":user_phone", $phone, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function preventAccess($request, $currentFile, $currently)
    {
        if ($request == "GET" && $currentFile == $currently) {
            header('Location:' . BASE_URL . 'index.php');
        }
    }

    public function delete($table,$array){
        $sql = "DELETR FROM '{$table}'";
        $where = "WHERE";

        foreach($array as $name => $value){
            $sql .= "{$where} '{$name}' = :{$name}";
            $where = " AND ";
        }

        if($stmt = $this->pdo->prepare($sql)){
            foreach($array as $name => $value){
                $stmt->bindParam(':'.$name, $value);
            }
            $stmt->execute();
        }
    }

    public function search($search)
    {
        $query = "SELECT * FROM 'student_info' WHERE uni_roll LIKE ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $search . '%', PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function loginUser($email, $password)
    {
        $query = "SELECT * FROM student_info WHERE email=:email OR uni_roll=:uni_roll";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':uni_roll', $email, PDO::PARAM_INT);
        $stmt->execute();
        $sturow = $stmt->fetch(PDO::FETCH_ASSOC);
        $passwordCheck = password_verify($password, $sturow['user_password']);
        if ($passwordCheck == false)
            return false;
        else {
            return true;
        }
    }

    public function checkAccountStatus($email)
    {
        $query = "SELECT verification_status FROM buddy_email_verifi  WHERE email=:email OR uni_roll=:uni_roll";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':uni_roll', $email, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['verification_status'] == 0) {
            return false;
        } else {
            $query = "SELECT user_id FROM student_info WHERE email=:email OR uni_roll=:uni_roll";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':uni_roll', $email, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $row['user_id'];
            header("Location: home.php");
            exit();
        }
    }

    public function useridByrollnumber($rollnumber)
    {
        $query = "SELECT user_id from student_info WHERE uni_roll=:uniroll";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':uniroll', $rollnumber, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user->user_id;
    }

    public function  loggedIn()
    {
        return (isset($_SESSION['userid'])) ? true : false;
    }
    
    public function checkUser($email, $uni_roll, $phone)
    {
        $query = "SELECT email , uni_roll , user_phone FROM student_info WHERE email=:email OR uni_roll=:uni_roll OR user_phone=:user_phone";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':uni_roll', $uni_roll, PDO::PARAM_INT);
        $stmt->bindParam(':user_phone', $phone, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail($email)
    {
        $query = "SELECT email FROM student_info WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkrollnumber($uni_roll)
    {
        $query = "SELECT uni_roll FROM student_info WHERE uni_roll=:uni_roll";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':uni_roll', $uni_roll, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkphonenumber($phone)
    {
        $query = "SELECT user_phone FROM student_info WHERE user_phone=:phone";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function notesDir($branch, $sem, $user_id)
    {
        $letter = "sem";
        $user = $this->UserData($user_id);
        $dir = "notes/$user->branch/$user->sem$letter/*";
        $path = array_filter(glob($dir), 'is_dir');
        return $path;
    }

    public function dirNames($search, $string)
    {
        $text = $this->stringsearch($search,$string);
        $folderName = substr($string, $text);
        return $folderName; 
    }

    public function stringsearch($search, $string){ 
        $position = strrpos($string, $search, 5);   
        if ($position == true){ 
            return $position + 1; 
        } 
        else{ 
            return "Not Found"; 
        } 
    }

    public function fileName($filename){
       $notesName =  pathinfo($filename, PATHINFO_FILENAME);
       return $notesName; 
    }

    public function UserData($user_id)
    {
        $query = "SELECT * from student_info WHERE user_id=:userid";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userid', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($table, $userid, $fields = array())
    {
        $columns  = ' ';
        $i = 1;
        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
        $sql = "UPDATE {$table} SET {$columns} WHERE 'user_id'= {$userid}";
        if ($stmt = $this->conn->prepare($sql)) {
            foreach ($fields as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->execute();
        }
    }

    public function VerifiEmail($email, $uni_roll, $emailToken, $emailSelector, $emailTokentime)
    {
        $query = "DELETE FROM buddy_email_verifi WHERE email=:email;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        //insering data 
        $query = "INSERT INTO buddy_email_verifi (email,uni_roll,emailToken,emailSelector,emailTokentime
           ) VALUES (:email,:uni_roll,:emailToken,:emailSelector,:emailTokentime)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":uni_roll", $uni_roll, PDO::PARAM_INT);
        $stmt->bindParam(":emailToken", $emailToken, PDO::PARAM_STR);
        $stmt->bindParam(":emailSelector", $emailSelector, PDO::PARAM_STR);
        $stmt->bindParam(":emailTokentime", $emailTokentime, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function SendEmail($email, $url)
    {
        $to = $email;
        $subject = 'Verifi your email';
        $message = '<h3><strong>Welcome to ptubuddy please verifi your account</strong></h3>';
        $message .= '<p>Here is your email verification link: <br></p>';
        $message .= '<a style="color:white;background-color:#3b5998; padding:5px; border-radius:3px; font-size:22px;"href="' . $url . '">Click Here</a></p>';
        $headers = "From: ptubuddy <ptubuddy@booknerd.in>\r\n";
        $headers .= "Reply-To: ptubuddy ptubuddy@booknerd.in\r\n";
        $headers .= "Content-type: text/html\r\n";
        mail($to, $subject, $message, $headers);
    }

    public function TimeAgo($datetime)
    {
        $time = strtotime($datetime);
        $currentTime = time();
        $seconds = $currentTime - $time;
        $minute = round($seconds / 60);
        $hour = round($seconds / 3600);
        $month = round($seconds / 2600640);

        if ($seconds <= 60) {
            return 'Just now';
        } elseif ($minute <= 60) {
            return $minute . "m ago";
        } elseif ($hour <= 24) {
            return $hour . "h ago";
        } elseif ($month <= 12) {
            return date('j M', $time);
        } else {
            return date('d M Y h:ia');
        }
    }


    public function InputValidate($data)
    {

        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = strtolower($data);
        return $data;
    }
    public function InputValidateEmail($data)
    {

        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        return $data;
    }
    public function InputPassword($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = strip_tags($data);
        return $data;
    }
}
