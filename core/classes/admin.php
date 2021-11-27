<?php
class Admin Extends User
{

    protected $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function adminData($email){
    	$query = "SELECT * FROM buddy_admin WHERE admin_email=:email";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':email',$email,PDO::PARAM_STR);
    	$stmt->execute();
    	return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function checkAdminEmail($email)
	{
		$stmt = $this->conn->prepare("SELECT admin_email FROM buddy_admin WHERE admin_email = :email");
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->execute();

		$count = $stmt->rowCount();
		if ($count > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function TotalStudents(){
		$query = "SELECT * FROM student_info";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public function TotalTeachers(){
		$query = "SELECT * FROM buddy_teachers";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public function quote(){
		$query = "SELECT * from buddy_quote";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function EditQuote($quote){
		$query = "UPDATE buddy_quote SET quote=:quote";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":quote",$quote,PDO::PARAM_STR);
		$stmt->execute();
	}

	public function create($table, $fields = array())
    {
        $columns = implode(',', array_keys($fields));
        $values = ':' . implode(', :', array_keys($fields));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        if ($stmt = $this->conn->prepare($sql)) {
            foreach ($fields as $key => $data) {
                $stmt->bindValue(':' . $key, $data);
            }
            $stmt->execute();
            return $this->conn->lastInsertId();
        }
    }
    public function adminDataid($admin_id){
    	$query = "SELECT * FROM buddy_admin WHERE admin_id=:admin_id";
    	$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(":admin_id",$admin_id,PDO::PARAM_INT);
    	$stmt->execute();
    	return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>