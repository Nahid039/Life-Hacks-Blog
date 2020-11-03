<?php
include_once 'Session.php';
include 'Database.php';

class User{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}


	public function select(){
		$query = "SELECT * FROM tbl_post";
		$stmt = $this->db->pdo->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function userRegistration($data){
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];
		$password = md5($data['password']);

		$sql = "INSERT INTO tbl_user(name, username, email, password) VALUES(:name, :username, :email, :password)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$result = $query->execute();
		Session::init();
		Session::set("login",true);
		header("Location: index.php");
		if($result){
			echo "You have been registered";
		}else{
			echo "something is wrong";
		}
	}

	public function readAll(){
		$sql = "SELECT * FROM tbl_user";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function readById($id){
		$sql = "SELECT * FROM tbl_user WHERE id=:id";
		$stmt =$this->db->pdo->prepare($sql);
		$stmt->bindValue(':id',$id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function postById($id){
		$sql = "SELECT * FROM tbl_post WHERE id=:id";
		$stmt =$this->db->pdo->prepare($sql);
		$stmt->bindValue(':id',$id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function update($data){
		$id = $data['id'];
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];

		$sql = "UPDATE tbl_user SET name=:name, username=:username, email=:email WHERE id=:id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':id',$id);
		$result = $query->execute();
		if($result){
			echo "You have been registered";
		}else{
			echo "something is wrong";
		}
	}

	public function getLoginUser($email, $password){
		$sql = "SELECT * FROM tbl_user WHERE email=:email AND password=:password";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function userLogin($data){
		$email = $data['email'];
		$password = md5($data['password']);

		$result = $this->getLoginUser($email, $password);
		if($result){
			Session::init();
			Session::set("login",true);
			Session::set("id",$result->id);
			Session::set("name",$result->name);
			Session::set("username",$result->username);
			header("Location: index.php");
		}else{
			echo "Data Not found";
		}
	}
}

?>