
 <?php
                  
?>
                        <div class ="col*xs-6"> </div>    
                        <table class = "table table-bordered table-hover">                            <thead>
                                <tr>
                                    <th> Id</th>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                   
                                </tr>
                            </thead>
                               <tbody>
<?php
                                   
$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);
                                   
while($row = mysqli_fetch_assoc($select_users)){ 
$user_id    	= $row['user_id'];
$username    	= $row['username'];
$user_firstname = $row['user_firstname'];
$user_lastname  = $row['user_lastname'];
$user_email    	= $row['user_email'];	
$user_role      = $row['user_role'];
	
	
echo "<tr>";
echo "<td>{$user_id}</td>";
echo "<td>{$username}</td>";
echo "<td>{$user_firstname}</td>";
echo "<td>{$user_lastname}</td>";
echo "<td>{$user_email}</td>";



////RELATE CATEGORIES TABLE TO POSTS TABLE USING CAT_ID AND POST_CAT_ID
//    
//$query = "SELECT * FROM comments WHERE comment_post_id = {$comment_post_id}";
//$result = mysqli_query($connection, $query); ``
//    
//while($row = mysqli_fetch_assoc($result)){
//    
//    $cat_id    = $row['cat_id'];
//    $cat_title = $row['cat_title'];
//    
//    echo "<td>{$cat_title}</td>";
//    
//}
//    
echo "<td>{$user_role}</td>";
	
////RELATING In Response To COMMENT POST ID WHICH IS P_ID	
//	
//	$query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
//	
//	$select_post_id_query = mysqli_query($connection,$query);
//	
//	while($row = mysqli_fetch_assoc($select_post_id_query)){
//    
//    $post_id    = $row['post_id'];
//	$post_title = $row['post_title'];
//    
//   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//    

//	}
 
	
	
	
	
 
echo "<td><a class='btn btn-success' href='users.php?change_to_admin={$user_id}'>Admin<a/></td>";
	
echo "<td><a class='btn btn-info' href='users.php?change_to_sub={$user_id}'>Subscriber<a/></td>"; 

echo "<td><a class='btn btn-primary' href='users.php?source=edit_user&edit_user={$user_id}'>Edit<a/></td>";

	
?>
				
<!--// IT IS MORE SECURE DELETE USING POST METHOD-->
				
<form action="" method="post">

<input type="hidden"  name="user_id" value="<?php echo $user_id; ?>">
	
<?php
echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete' ></td>"		
				
?>	
</form>


								
<?php				
	
	
//echo "<td><a href='users.php?delete={$user_id}'>Delete<a/></td>";    
    
    
echo "</tr>";    

}                                   
     
?>                                
                                 

<?php
// CHANGE USER TO admin								   
								   
if(isset($_GET['change_to_admin'])){
    
    $the_user_id = escape($_GET['change_to_admin']);
    
$query = "UPDATE users SET user_role ='admin' WHERE user_id =$the_user_id ";
    
$change_user_to_admin_query = mysqli_query($connection, $query);  
// to refresh the page
    header("Location: users.php");
 
}

							   
// CHANGE USER TO SUBSCRIBER							   
								   
if(isset($_GET['change_to_sub'])){
    
    $the_user_id = escape($_GET['change_to_sub']);
    
$query = "UPDATE users SET user_role ='subscriber' WHERE user_id =$the_user_id ";
    
$change_user_to_sub_query = mysqli_query($connection, $query);  
// to refresh the page
    header("Location: users.php");
 
}



						   
								   
								   
								   
								   
// DELETE USERS QUERY
if(isset($_POST['delete'])){
	
///// VALIDATING THE CODE ********IMPORTANT******************	
	
if(isset($_SESSION['user_role'])){
	
	
	if($_SESSION['user_role'] == 'admin'){
	
//$the_user_id = $_GET['delete'];

$the_user_id = mysqli_real_escape_string($connection, $_POST['user_id']); 		
		
$query ="DELETE FROM users WHERE user_id =$the_user_id ";
    
$delete_user_query = mysqli_query($connection, $query);  
// to refresh the page
    header("Location: users.php");
    
}    
    
}

}


?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
