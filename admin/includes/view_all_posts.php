<?php include "delete_model.php";   ?>





<?php
///////////////CATCHING checkBoxArrayY[] VALUES/////////////////
if(isset($_POST['checkBoxArray'])){

//////////*********TAKING post_id values to checkBoxArray[]****************/	
foreach($_POST['checkBoxArray'] as $postValueId){
	
///////////////******	TAKING THE VALUE FROM FORM SELECT Name *************/
$bulk_options = $_POST['bulk_options'];
	
///////////////******	TAKING THE VALUE FROM FORM SELECT OPTION value *************/
	
switch($bulk_options){
		
	case 'published':
		
		$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id ='{$postValueId}' ";
		$update_to_publish_status = mysqli_query($connection, $query);	
		
		confirmQuery($update_to_publish_status);		
		
		break;
		
		
		case 'draft':
		
		$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id ='{$postValueId}' ";
		$update_to_draft_status = mysqli_query($connection, $query);	
		
		confirmQuery($update_to_draft_status);		
		
		break;

		
		case 'delete':
		
		$query = "DELETE FROM  posts  WHERE post_id ='{$postValueId}' ";
		$delete_post = mysqli_query($connection, $query);	
		
		confirmQuery($delete_post);		
		
		break;
		
		
		
		case 'clone':
		
		$query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
		$select_post_query = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_array($select_post_query)){

		$post_status	  = $row['post_status'];
		$post_author      = $row['post_author'];
		$post_user        = $row['post_user'];	
		$post_title       = $row['post_title'];
		$post_category_id = $row['post_category_id'];
		$post_content     = $row['post_content'];
		$post_image       = $row['post_image'];
		$post_tags        = $row['post_tags'];
		$post_date 		  = $row['post_date'];

			
		}

		
$query = "INSERT INTO posts (post_category_id, post_title, post_author, post_user, post_date, post_image, post_content, post_tags, post_status) ";	
		
$query.= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', '{$post_user}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";		
		
$copy_query = mysqli_query($connection, $query);		
		
		
if(!$copy_query){
	
die("Query failed". mysqli_error($connection));	
	
}		
		
break;		
}
	
	
}
	
}



?>
        

        
        
<!--///////// POST OPTIONS CHECK BOX////////////////////-->
         <form action="" method= "POST">
                      
<table class = "table table-bordered table-hover">                           	

	
	<div id="BulkOptionContainer" class="col-xs-4">

		<select class="form-control" name="bulk_options" id="" style="padding: 0px">
		<option value="">Select Options</option>	
		<option value="published">Publish</option>	
		<option value="draft">Draft</option>	
		<option value="delete">Delete</option>
		<option value="clone">Clone</option>	
	</select>
	
	</div>

<div class="col-xs-4">	
<input type="submit" name="submit" value="Apply" class="btn btn-success">	
<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>	
		
		
</div>		
	
	    
                                                                                                                
      
  							<thead>
                                <tr>
                                   <th><input id="selectAllBoxes" type="checkbox"></th>
                                   <th>Post Id</th>
                                    <th>Users</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>comments</th>
                                    <th>Date</th>
                                    <th>View Post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Views</th>
                                </tr>
                            </thead>
                               <tbody>
<?php
                                   
//$query = "SELECT * FROM posts ORDER BY post_id DESC";
								   
//******** JOINING TABLES Categories and Posts /*************************************************
	
								   
$query="SELECT posts.post_id, posts.post_author, posts.post_user, posts.post_title, posts.post_category_id,";
$query.="posts.post_status, posts.post_image, posts.post_tags, posts.post_comment_count, posts.post_date, ";
$query.="posts.post_views_count, categories.cat_id, categories.cat_title ";
								   
$query .= "FROM posts ";
								   
$query .= "LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.post_id DESC";						//// post_category_id on posts is same as category_id in categories		   
								   
								   
//$query = "SELECT * FROM posts ORDER BY post_id DESC";								   
								   
$select_posts = mysqli_query($connection, $query);
                                   
while($row = mysqli_fetch_assoc($select_posts) ){

$post_id          = $row['post_id'];
$post_author      = $row['post_author'];	
$post_user        = $row['post_user'];
$post_title       = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status      = $row['post_status'];
$post_image       = $row['post_image'];
$post_tags        = $row['post_tags'];
$post_comment_count  = $row['post_comment_count'];    
$post_date 			 = $row['post_date'];
$post_views_count  	 = $row['post_views_count'];
// AS CATEGORIES AND POSTS TABLE ARE RELATED WE CAN GET CATEGORY TABLE DATA	
$cat_title 	         = $row['cat_title'];
$cat_id 	         = $row['cat_id'];	

echo "<tr>";
?>    

<!--//////****************** CHECK BOXES***************//////////////////////////////////	-->
	
<td><input class='checkBoxes' type='checkbox' name= 'checkBoxArray[]' value='<?php echo $post_id;?>' </td>

<?php		
	
echo "<td>{$post_id}</td>";
	
	
//<div class="form-group">
//	<select name="post_status" id="">
//		<option value></option>
//		
//	</select>
//	</div>
//		
	
///////// ADDING POST USERS TO view_all_posts  TABLE an creating a link
	
if(!empty($post_author)){
	
echo "<td>{$post_author}</td>";	
	
}elseif(!empty($post_user)){
	
echo "<td>{$post_user}</td>";	
	
	
	
}	
	


	
	
	
	
	
	
	
echo "<td>{$post_title}</td>";

//RELATE CATEGORIES TABLE TO POSTS TABLE USING CAT_ID AND POST_CAT_ID
    
//$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//$result = mysqli_query($connection, $query);
//    
//while($row = mysqli_fetch_assoc($result)){
//    
//    $cat_id    = $row['cat_id'];
//    $cat_title = $row['cat_title'];
    
    echo "<td>{$cat_title}</td>";
    
//}
    
echo "<td>{$post_status}</td>";
echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
echo "<td>{$post_tags}</td>";
	
	
	
////////////////POST COMMENT COUNT//////////////////	
$query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
$send_comment_query = mysqli_query($connection, $query);

$comment_id = $row['comment_id'];
$count_comments = mysqli_num_rows($send_comment_query);

///**CREATING A LNK TO view all comments for specific post*************************
echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</a></td>";
//echo "<td>{$count_comments}</td>";

	
	
echo "<td>{$post_date}</td>";
	
//////ADD A LINK TO VIEW a POST IN CMS FRONT SIDE	
echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View Post<a/></td>"; 
    
//ADD LINK TO POSTS TO  EDIT 
echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Edit<a/></td>";    

//ADD LINK TO POSTS TO DELETE     
//echo "<td><a href='posts.php?delete={$post_id}'>Delete<a/></td>";    

////***********ADD LINK TO POSTS TO CONFIRMATION TO DELETE***********************************    

//echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";

//**********DELETINH USING DELETE MODAL*************	
	
  
?>
<!--// deleting posts using post method-->

<form action="" method="post">

<input type="hidden"  name="post_id" value="<?php echo $post_id; ?>">
	
<?php
echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete' ></td>"		
				
?>	
</form>
		
	
<?php			
					
//echo "<td><a rel= '$post_id' href='javascript:void(0)' class='delete_link' >Delete<a/></td>";    

	
	
	
	
	
//////////***********DISPLAY post_views_count****************
echo "<td><a class='btn btn-warning href='posts.php?reset={$post_id}'>{$post_views_count}<a/></td>";	
	
echo "</tr>";    

	
}                                   
     
?>                                
                                 

   
   </tbody>
   </table>
   </form> 


<?php
// DELETE POSTS QUERY
if(isset($_POST['delete'])){
    
    $delete_post_id = ($_POST['post_id']);
    
$query = "DELETE FROM posts WHERE post_id ='{$delete_post_id}' ";
    
$delete_posts_query = mysqli_query($connection, $query);  
// to refresh the page
    header("Location: /cms/admin/posts.php");
    
    
}

?>
                        
                        
  
                        
<?php

/////////////*********RESET post_viesw_count*************///////////                                          
if(isset($_GET['reset'])){

$the_post_id =escape($_GET['reset']); 	

//$query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $the_post_id ";

////// escaping the values for security//////////////
	
$query = "UPDATE posts SET post_views_count = 0 WHERE post_id = ".mysqli_real_escape_string($connection, $the_post_id ). " "; 
    	
	
	
$reset_posts_query = mysqli_query($connection, $query);  
// to refresh the page
    header("Location: posts.php");
    
    
}                                                                   
?>                                                                                          
                                                                                                                
                                                                                                                                      
<!--//////////////**** DELETE MODEL********************* -->
 
<script>
    


    $(document).ready(function(){


        $(".delete_link").on('click', function(){


            var id = $(this).attr("rel");

            var delete_url = "posts.php?delete="+ id +" ";


            $(".modal_delete_link").attr("href", delete_url);


            $("#myModal").modal('show');


        });



    });




  <?php if(isset($_SESSION['message'])){

         unset($_SESSION['message']);

     }

         ?>



</script>
                                                                                                                                                                                                                  
                        
                        
    <?php //include "includes/admin_footer.php";  ?>                    
                        
                        
                        
                        
                        
                        