<?php
require_once('database.php');
class User
{
	public $id;
	public $email;
	public $password;
	public $firstname;
	public $lastname;
	public $phone_no;
	public $vendor_id;
	public $status;

	public static function select_query($id='')
	{
	global $database;
	$q=$id?"select * from users where id={$id}":"select * from users";
	$result=$database->query($q);
	return $result;
	}

	public static  function find_all_users()
	{
		$users=[];
		global $database;
		$result=self::select_query();
		while ($row=$result->fetch()) {
			$users[]=self::getObject($row);
		}
		return !empty($users)?$users:false;
	}

	public static  function find_user_by_id($id)
	{
		global $database;
		$result=self::select_query($id);
		$row=$result->fetch();
		return $row?self::getObject($row):false;
	}

	public static function find_user_by_email($email)
	{
		global $database;
		$q='select * from users where email=?';
		$result=$database->query($q,array($email));
		$row=$result->fetch();
		return self::getObject($row);
	}

	public function find_vendor_id($vendorname)
	{
		global $database;
		$q="select id from vendor where orgname='{$vendorname}'";
		$result=$database->query($q);
		if($result)
		{
			$row=$result->fetch();
			return $row['id'];
		}
		else
		{
			return null;
		}
	}

	public static  function verifyLogin($email,$password)
	{
		global $database;
		$q="select * from users where email=?";
		$result=$database->query($q,array($email));
		// $result->rowCount();
		// echo "<pre>";
		// print_r($row=$result->fetch());
		// $hey = $row=$result->fetch();
		// print_r((string)$hey['password']);

		// exit;
		if($result->rowCount()>0)
		{
			// echo $row['password'];
			$row=$result->fetch();
			// if($row['status']=='inactive')
			// {
			// 	return false;
			// }
			if(password_verify((string)$password,(string)$row['password']))
			{	
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}


	public function create()
	{
	global $database;
	$q="insert into users(email,password,firstname,lastname,phone_no,vendor_id) values(?,?,?,?,?,?)";
	    $result=$database->query($q,array($this->email,password_hash($this->password,PASSWORD_DEFAULT),$this->firstname,$this->lastname,$this->phone_no,$this->vendor_id));

	    return  $result;

	}


public static function update($firstname,$lastname,$email,$phone_no,$password,$id)
	{
	global $database;
	$q="update users set firstname=?, lastname=?, email=?, phone_no=?, password=? where id=?";
	$result=$database->query($q,array($firstname,$lastname,$email,$phone_no,password_hash($password,PASSWORD_DEFAULT),$id));
	if($result->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}

	}

public function delete()
	{
		global $database;
		$q="delete from users where id=".$this->id;
		$result=$database->query($q);
		return $result;

	}


	public static function getObject($row)
	{
		$user=new User();
		foreach ($row as $key => $value) {
		if($user->checkKey($key))
				{
				$user->{$key}=$value;
				}
			}
		return $user;
	}

	public  function checkKey($key)
	{
		$properties=get_object_vars($this);
		return array_key_exists($key, $properties);
	}

	public function check_email_already_exists()
	{
		global $database;
		$q="select * from users where email=?";
		$result=$database->query($q,array($this->email));
		if($result->rowCount()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function check_phoneno_already_exists()
	{
		global $database;
		$q="select * from users where phone_no=?";
		$result=$database->query($q,array($this->phone_no));
		if($result->rowCount()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>