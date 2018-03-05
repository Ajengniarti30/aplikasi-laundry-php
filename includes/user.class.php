
<?php
/*
*This is a PDO OOP PHP(5.3) Login Form I am working on currently
*
* Author: Artem Aksenov
* Date: 22.02.2016
* Version 1.0
* Used Technologies: PHP <!--HTML5/CSS3/Bootstrap3.5/JS/JQuery-->/
* I haven't finished it...
*/

include_once('connection.php');

class User {

  protected $_db;

  public $username;
  public $password;

	public function __construct() {
		$this->_db = new Connection();
		$this->_db = $this->_db->dbConnect();

		/*$_POST['username'] = $this->username;
		$_POST['password'] = $this->password;
		I could not finish register function because these vars
		were created or smth like this. but if they are not being created
		upon object is created (instantiated) - then everything works

		*/

	}

	public function redirect($url) {
		return $url;
	}

	public function login($username, $password) {
		$stmt = $this->_db->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':password', $password, PDO::PARAM_STR);
		$stmt->execute();
		/* var $userData is an array fetched from DB with given username and password
		I pass this array userData as a var to the function loggedIn()

		*/
		$userData = $stmt->fetch(PDO::FETCH_ASSOC);
		//$this->rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() === 1) {

			$this->loggedIn($userData);
			return $this->display();
		} else {
			echo "wrong";
		 /*return $this->register();*/
		}

	}

	public function register($username, $password) {



		$stmt = $this->_db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");


		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':password', $password, PDO::PARAM_STR);

		$stmt->execute();
		if ($stmt->rowCount() === 1) {
			echo "I inserted something";
		} else {
			echo "wrong ddd";

		}



	}

	public function update() {

	}

	public function display() {
	header('location:dashboard.php');


	}

	public function loggedIn($userData) {
		if (isset($_SESSION['userData'])) {
			return true;
		} else {
			$_SESSION['userData'] = $userData;
		$_SESSION['id'] = $userData['id'];
		$_SESSION['username'] = $userData['username'];
		$_SESSION['password'] = $userData['password'];

		$this->id = $_SESSION['id'];
		$this->username = $_SESSION['username'];
		$this->password = $_SESSION['password'];

		return $userData; }
		//print $this->username;
		//print $this->password;
		/* In the function loggedIn which receives $userData as
		an argument from the function login()
		where it was declared as a var
		*/
		//print $_SESSION['userData'];

	}

	public function logOut() {
		session_destroy();
		unset($_SESSION['userData']);
		print('loggedddd out');
		return true;
	}

}

class Subscriber extends User {
	//do something
}

class Administrator extends User {
	//do something
}
