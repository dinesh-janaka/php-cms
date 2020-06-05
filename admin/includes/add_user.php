<?php 


if(isset($_POST['create_user'])){
    
	
    		$user_firstname    = escape($_POST['user_firstname']);
            $user_lastname     = escape($_POST['user_lastname']);
            $user_role         = escape($_POST['user_role']);
	
			//    $user_image = $_FILES['image']['name']; 
			//    $user_image_temp = $_FILES['image']['tmp_name'];

			$username          = escape($_POST['username']);
            $user_email        = escape($_POST['user_email']);
            $user_password     = escape($_POST['user_password']);
  
//    move_uploaded_file($user_image_temp, __DIR__."/../../images/$post_image" );
$user_password  = Password_hash($user_password ,PASSWORD_BCRYPT,array('cost'=>10));
    
   
$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_password,   user_email) ";
    
$query.= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_password}', '{$user_email}') ";    
    
  
    
//$create_post_query  = $connection->query($query);        
    
$create_user_query = mysqli_query($connection, $query);
    
confirmQuery($create_user_query);    

echo "User Created: "." ". "<a href= 'users.php'>View Users <a/> ";

}
?>
  

  
  <form action="" method="post" enctype="multipart/form-data">
   
     <div class="form-group">
      <label for="post_author">Firstname</label>
     <input type="text" class="form-control" name="user_firstname">     
     </div> 
    

    
        <div class="form-group">
      <label for="post_status">Lastname</label>
     <input type="text" class="form-control" name="user_lastname">     
     </div> 
       
       
       
        <div class="form-group">
       
       <select name="user_role" id="">
        <option value="subscriber">Select Options</option>
          <option value="admin">Admin</option>
          <option value="subscriber">Subscriber</option>
           
        
       </select>
       
       
       
       
      </div>

       
        
<!--

<div class="form-group">
<label for="post_image">Post Image</label>
<input type="file"  name="image">
<img width = '100' alt ="">     
</div> 
-->
            
            <div class="form-group">
      <label for="post_tags">Username</label>
     <input type="text" class="form-control" name="username">     
     </div> 

        <div class="form-group">
         <label for="post_content">Email</label>
     <input type="email" class="form-control" name="user_email">     
      </div>
    
        <div class="form-group">
         <label for="post_content">Password</label>
     <input type="password" class="form-control" name="user_password">     
      </div>
    
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">   
    </div>
    
</form>