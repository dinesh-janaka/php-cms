
<?php



////////////*************REDIRECT FUNCTION **************

function redirect($location){
	
	return header("Location:" .$location);
	
	
	
}





//??????????****************???????????****************///////////////**********???????
// musql injection to secure the site

function escape($string){
	
global $connection;	
return mysqli_real_escape_string($connection, trim($string));	
	
	
	
}




//***************************************************************************************************


function users_online(){
///// CHECKING USERS ONLINE USING ajex in scripts.js///////////////////	
	
if(isset($_GET['onlineusers'])){
	
global $connection;
	
	
if(!$connection){
	
	
session_start();
	
include("../includes/db.php");	
	
$session = session_id();	
$time = time();        
$time_out_in_seconds = 05;
$time_out = $time - $time_out_in_seconds;


$query = "SELECT * FROM users_online WHERE session = '$session'";
$send_query = mysqli_query($connection, $query);
$count = mysqli_num_rows($send_query);

if($count == NULL){

/// *********if the user is new*******************
mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");

	
} else {
////// if the user is not new one************	
mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session' ");
	
}

////  FIND OUT HOW MANY MINUTUS USER HAS BEEN IN THE SITE***************


$users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out' ");	
	
echo $count_user = mysqli_num_rows($users_online_query);	
	
	
	
}	
	
	
}

}///// GET REQUEST isset()***************
users_online();

//************************************//////////**********///////////*************/*////////////////**///

// FUNCTION WITHOUT AJEX IN scripts.js

//function users_online(){
////*********************************************************************************************	
//	
/////// CHECKING USERS ONLINE///////////////////	
//global $connection;
//	
//$session = session_id();	
//$time = time();        
//$time_out_in_seconds = 30;
//$time_out = $time - $time_out_in_seconds;
//
//
//$query = "SELECT * FROM users_online WHERE session = '$session'";
//$send_query = mysqli_query($connection, $query);
//$count = mysqli_num_rows($send_query);
//
//if($count == NULL){
//
///// *********if the user is new*******************
//mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");
//
//	
//} else {
//////// if the user is not new one************	
//mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session' ");
//	
//}
//
//////  FIND OUT HOW MANY MINUTUS USER HAS BEEN IN THE SITE***************
//
//
//$users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out' ");	
//	
//return $count_user = mysqli_num_rows($users_online_query);	
//	
//
//	
//}

//********************************************************************************************************
function confirmQuery($result){
   
    global $connection;
    
    if(!$result){
    
    die("query failed".mysqli_error($connection));
}    
    

}



///////////////**************************************************************************************

function insert_catagories(){
    global $connection;
// check category is submited           
           
if(isset($_POST['submit'])){ 
    $cat_title = $_POST['cat_title'];
    
// check the cat_title is empty (validation) 
    
if($cat_title == "" || empty($cat_title)){
    echo "<h1>This field can not be empty</h1>";
        

}else{
    
    $query = "INSERT INTO categories(cat_title) ";
    $query .= "VALUE  ('{$cat_title}') ";
    
    $create_category_query = mysqli_query($connection, $query);
    
// check if this is working
    
    if(!$create_category_query){
 die('Query Failed'. mysql_error($connection));        
        
    }
}    
    
}    
       
}



//*******************************************************************************************************


function findAllCategories(){
    global $connection;
    
// Find all categories          
$query = "SELECT * FROM categories";
$select_categories_sidebar = mysqli_query($connection, $query);           
                                       
                
while($row = mysqli_fetch_assoc($select_categories_sidebar)){
    
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
    
    echo "<tr>";
echo "<td>{$cat_id}</td>";    
echo "<td>{$cat_title}</td>";
	
// create a link to Edit the categories    
echo "<td><a class='btn btn-info' href='categories.php?edit={$cat_id}'>Edit</a></td>";    

?>
<!--// deleting posts using post method-->

<form action="" method="post">

<input type="hidden"  name="cat_id" value="<?php echo $cat_id; ?>">
	
<?php
echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete' ></td>"		
				
?>	
</form>
		
	
<?php			
	
	
// create a link to delete the data from categories    
//echo "<td><a class='btn btn-danger' href='categories.php?delete={$cat_id}'>Delete</a></td>";    
    
    echo "</tr>";
    
}
    
}


///*******************************************************************************************************
function deleteCategories(){
     global $connection;
    
//Delete from categories               
if(isset($_POST['delete'])){
    
$the_cat_id = $_POST['cat_id'];
$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";   
$delete_query = mysqli_query($connection, $query);  
    
// to refresh the page
    header("Location: categories.php");
        
}            
    
}


////////////////////////ADDING DYNAMIC POSTS/////////////////////////////////////			

function recordCount($table){
	global $connection;
    
	
$query = "SELECT * FROM " .$table;
$select_all_post = mysqli_query($connection, $query);
						
$result =mysqli_num_rows($select_all_post);
 
confirmQuery($result);
	
return $result;	
	
	
	
	
}


////////********STATUS CHECKED IN ADMIN INDEX PAGE

function checkStatus($table, $column, $status){
	
	global $connection;
	
	
$query = "SELECT * FROM $table WHERE $column = '$status' ";
$result = mysqli_query($connection, $query);
	
confirmQuery($result);
	
return mysqli_num_rows($result);				
	
} 
	
////////********userrole CHECKED IN ADMIN INDEX PAGE

function checkUserRole($table, $column, $role){
	
	global $connection;
	
$query = "SELECT * FROM $table WHERE $column = '$role' ";
$result= mysqli_query($connection, $query);
	
confirmQuery($result);
	
return mysqli_num_rows($result);				
	
	
}



/////// **********checkking user roles and granting access to admin page********/////////////////////

function is_admin($username){

	global $connection;
	
$query ="SELECT user_role FROM users WHERE username = '$username' ";
$result = mysqli_query($connection, $query);	
confirmQuery($result);
	
	
$row = mysqli_fetch_array($result);
	
if($row['user_role'] == 'admin'){
	
	return true;
	
	
}else{
	
	return false;
	
}	
	
	
}



////////////********** CHECKING DUPLICATE USER NAMES ////////////////////////



function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }


}



////////////********** DUPLICATE USER Email////////////////////////



function email_exists($email){

    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }

}






//////// register user function////////-**********************************************************



function register_user($username, $email, $password){
	
	global $connection;
	
				$username = $_POST['username'];
				$email 	  = $_POST['email'];
				$password = $_POST['password'];
					
					
////////////VALIDATING THE FIELDS IN REGISTRATION FORM/////////////////	
	
//if(!empty($username) && !empty($email) && !empty($password)){
	
	
		/////////////// password protection//////////// 	
	$username = mysqli_real_escape_string($connection, $username);
	$email 	  = mysqli_real_escape_string($connection, $email);
	$password = mysqli_real_escape_string($connection, $password);


	/////// NEW BETTER METHOD TO ENCRYPT PASSWORD
	$password = Password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));


	$query = "INSERT INTO users (username, user_email, user_password, user_role) ";
	$query.= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber' )";

	$register_user_query = mysqli_query($connection, $query);


	confirmQuery($register_user_query);


}


function login_user($username,$password){

	global $connection;
	
	
	$username = trim($username);
	$password = trim($password);	


	//MYSQL INJECTION
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);



	$query = "SELECT * FROM users WHERE username ='{$username}' ";	
	$select_user_query = mysqli_query($connection, $query);
	
if(!$select_user_query){
	
	die("QUERY FAILED". mysqli_error($connection)); 
	
}	
	
while($row = mysqli_fetch_array($select_user_query)){
	
	$db_user_id 	  = $row['user_id'];
	$db_username 	  = $row['username'];
	$db_user_password = $row['user_password'];
	$db_user_firstname = $row['user_firstname'];
	$db_user_lastname = $row['user_lastname'];
	$db_user_role	  = $row['user_role'];
	

}
	
			///////////// MAKING USER TO LOGIN WITH DEFAULT PASSORD////////////
			//$password = crypt($password, $db_user_password);		
			//	
			//	/////////////////THIS IS A STRICT WAY TO VALIDATE///////////////////
			//	
			//if($username === $db_username && $password === $db_user_password ){
			//

	
if(password_verify($password, $db_user_password)){
	
/////////SETTING VALUES WITH SESSION//////	
$_SESSION['username']  = $db_username;
$_SESSION['firstname'] = $db_user_firstname;
$_SESSION['lastname']  = $db_user_lastname;
$_SESSION['user_role'] = $db_user_role;
$_SESSION['user_id']   = $db_user_id;
	
// CALLING REDIRECT FUNCTION*********	
redirect("/cms/admin");	
	
} else {
	
redirect("/cms/index.php");	
}
	
	
}	
	
	
	
	
	
	












?>