<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "../admin/functions.php"; ?>



<?php


if(isset($_POST['login'])){
	
	
//calling the login_user from the functions.php*********************************************	
login_user($_POST['username'], $_POST['password']);
	
}
////MYSQL INJECTION
//	
//$username = mysqli_real_escape_string($connection, $username);
//$password = mysqli_real_escape_string($connection, $password);
//	
//	
//	
//$query = "SELECT * FROM users WHERE username ='{$username}' ";	
//$select_user_query = mysqli_query($connection, $query);
//	
//if(!$select_user_query){
//	
//	die("QUERY FAILED". mysqli_error($connection)); 
//	
//}	
//	
//while($row = mysqli_fetch_array($select_user_query)){
//	
//	$db_user_id 	  = $row['user_id'];
//	$db_username 	  = $row['username'];
//	$db_user_password = $row['user_password'];
//	$db_user_firstname = $row['user_firstname'];
//	$db_user_lastname = $row['user_lastname'];
//	$db_user_role	  = $row['user_role'];
//	
//
//}
//	
//			///////////// MAKING USER TO LOGIN WITH DEFAULT PASSORD////////////
//			//$password = crypt($password, $db_user_password);		
//			//	
//			//	/////////////////THIS IS A STRICT WAY TO VALIDATE///////////////////
//			//	
//			//if($username === $db_username && $password === $db_user_password ){
//			//
//
//	
//if(password_verify($password, $db_user_password)){
//	
///////////SETTING VALUES WITH SESSION//////	
//$_SESSION['username']  = $db_username;
//$_SESSION['firstname'] = $db_user_firstname;
//$_SESSION['lastname']  = $db_user_lastname;
//$_SESSION['user_role'] = $db_user_role;
//$_SESSION['user_id']   = $db_user_id;
//	
//header("Location: ../admin ");	
//	
//} else {
//	
//header("Location: ../index.php");	
//}
//	
//	
//} 
	
//if($username !== $db_username && $password !== $db_user_password ){
//	
////SEND TO INDEX.PHP
//header("Location: ../index.php ");	
//	
//} else if ($username == $db_username && $password == $db_user_password){
//	
////SETTING VALUES WITH SESSION	
//$_SESSION['username'] 		= $db_username;
//$_SESSION['user_firstname'] = $db_user_firstname;
//$_SESSION['user_lastname']  = $db_user_lastname;
//$_SESSION['user_role'] 		= $db_user_role;
//	
//header("Location: ../admin ");	
//	
//} else {
//	
//header("Location: ../index.php");	
//	
//}	
//	


?>