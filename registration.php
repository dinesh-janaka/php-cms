<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<?php

//if(isset($_POST['submit'])){

if($_SERVER['REQUEST_METHOD'] == "POST"){

// trim is for  deleting whitespace
$username = trim($_POST['username']); 
$email 	  = trim($_POST['email']);
$password = trim($_POST['password']);

					
$error = [
	
	'username'=> '',
	'email'=> '',
	'password'=> ''
	
		];					
					
if(strlen($username) < 4){
	
	$error['username'] = 'Username needs to be longer';
	
}					

if($username == ''){
	
	$error['username'] = 'username can not be empty';
	
}					
	
if(username_exists($username)){
	
	$error['username'] = 'username already exists, Please pick another one';
	
}
					
if($email == ''){
	
	$error['email'] = 'email can not be empty';
					
}

if(email_exists($email)){
	
	$error['email'] = 'email already exists, <a href="index.php">Please login</a>';
	
}
   
if($password == ''){
	
	$error['password'] = 'password can not be empty';
}	
	

	
	
/// CHECKING THE VALUES IN ARARY
	
foreach($error as $key => $value){
	
	if(empty($value)){

	unset($error[$key]);	
}


}
if(empty($error)){
///**** calling register_user function from functions.php****************		
	register_user($username, $email, $password);

	///**** calling login_user function from functions.php****************		
		login_user($username, $password);
	
}
	
	
	
	
}	
	
	
	
	
	
	
   

					

//				$username = $_POST['username'];
//				$email 	  = $_POST['email'];
//				$password = $_POST['password'];
//					
//					
////************ CHECKIG THE THE USER ALREADY EXISTS OR NOT*************************
//					
//if(username_exists($username)){
// 
//$message = "User Exists";       
//
//}
//
//////////////VALIDATING THE FIELDS IN REGISTRATION FORM/////////////////	
//	
//if(!empty($username) && !empty($email) && !empty($password)){
//	
//	
//	/////////////// password protection//////////// 	
//$username = mysqli_real_escape_string($connection, $username);
//$email 	  = mysqli_real_escape_string($connection, $email);
//$password = mysqli_real_escape_string($connection, $password);
//
//	
///////// NEW BETTER METHOD TO ENCRYPT PASSWORD
//$password = Password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
//	
//	
////$query = "SELECT randSalt FROM users ";
////$select_randSalt_query = mysqli_query($connection, $query);
////if(!$select_randSalt_query){
////die("Query Failed". mysqli_error($connection));
////}	
////
////$row = mysqli_fetch_array($select_randSalt_query);
////
////$salt = $row['randSalt']; 
////
////////******************* CRYPTING THE PASSWORD***********/////////////////////////////	
////	$hashFormat = "$2y$10$";
////    $salt = "iusesomecrazystrings22"; 
////    $hash = $hashFormat . $salt; 
//////	
////$password = crypt($password, $salt);	
////	
//	
//$query = "INSERT INTO users (username, user_email, user_password, user_role) ";
//$query.= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber' )";
//
//$register_user_query = mysqli_query($connection, $query);
//
//
//
//if(!$register_user_query){
//
//die("Query Failed " .mysqli_error($connection) . ' '. mysqli_errno($connection));
//
//
//}
//
///////////MASSAGE TO THE USER////////////
//$message = "Your registration has been submitted";
//
//}else{
//	
//	
//$message = "Fields can not be empty";	
//	
//}	
	

//}else{
//	
//$message = " ";	
//}
				
				
?>
		<!-- Navigation -->

			<?php  include "includes/navigation.php"; ?>


			<!-- Page Content -->
			<div class="container">

		<section id="login">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
						<div class="form-wrap">
						<h1>Register</h1>
							<form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
							
							
					<div class="form-group">
					<div class="form-group">
					<label for="username" class="sr-only">username</label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on"

					value="<?php echo isset($username) ? $username : ''   ?>" >
				<!--auto complete username and displaying it-->
				
				
					<!--displaying errors if the user has done wrong-->
					<p><?php echo isset($error['username']) ? $error['username'] : ''   ?></p>

					
				</div>


								 
								  
								   
								    
				  <div class="form-group">
				<label for="email" class="sr-only">Email</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on"

					value="<?php echo isset($email) ? $email : ''   ?>" >


				<p><?php echo isset($error['email']) ? $error['email'] : ''   ?></p>		
		
					</div>

								 
								 
								 
								 <div class="form-group">
									<label for="password" class="sr-only">Password</label>
									<input type="password" name="password" id="key" class="form-control" placeholder="Password">
								</div>

					<p><?php echo isset($error['password']) ? $error['password'] : ''   ?></p>		
							
								<input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
							</form>

						</div>
					</div> <!-- /.col-xs-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</section>


				<hr>



		<?php include "includes/footer.php";?>
