<?php  include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php session_start(); ?>




 <!-- Navigation -->
     
<?php include "includes/navigation.php";   ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


<?php
     
        //CATHING THE category FROM INDEX PAGE        
                
        if(isset($_GET['category'])){
            
		
        $post_category_id = $_GET['category'];  
            
          

// DONT SHOW draft to visitors but to admin	
	
//if($_SESSION['user_role'] && $_SESSION['user_role']=='admin') {
	
if(is_admin($_SESSION['username'])){		

 //using prepare statements	its more secure as its not taking external data	
//***	statement = mysqli_pepare("connection, query ?") 
	
$stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_user, post_date, post_image, post_content FROM posts WHERE post_category_id = ?");	
	
	
}else{
	

$stmt2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_user, post_date, post_image, post_content FROM posts WHERE post_category_id = ? AND post_status = ?");
	
	$published = 'published';
	
}	
 
			
		
if(isset($stmt1)){
	
// if ithe value is an integer use i if its a string use s	
	mysqli_stmt_bind_param($stmt1, "i", $post_category_id);
	
	mysqli_stmt_execute($stmt1);
	
	mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_user, $post_date,  $post_image, $post_content);
	
$stmt = $stmt1;
	
} else{
						//****integer and string="is"******				
	    mysqli_stmt_bind_param($stmt2, "is", $post_category_id, $published);

        mysqli_stmt_execute($stmt2);

        mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_user, $post_date, $post_image, $post_content);


     $stmt = $stmt2;

    }
	

			
if(mysqli_stmt_num_rows($stmt) === 0){

echo"<h1 class='text-center'>No Post categories Available</h1>";


}

while(mysqli_stmt_fetch($stmt)):

//	$post_id  	 = $row ['post_id'];
//	$post_title  = $row ['post_title'];
//	$post_author = $row ['post_author'];
//	$post_user 	 = $row ['post_user'];
//	$post_date   = $row ['post_date'];
//	$post_time   = $row ['post_time'];
//	$post_image  = $row ['post_image'];

//	//DISPLAT LESS CONTENT IN HOME PAGE USING substr( content   ,characters from, charaters to)
//
//	$post_content  = substr($row['post_content'], 0,100);


			
//$select_all_posts_query = mysqli_query($connection, $query);
			
	            
////display data from posts 
//  $query = "SELECT * FROM posts WHERE post_category_id = {$post_category_id} ";
//
//$query = "SELECT * FROM posts WHERE post_category_id = {$post_category_id} AND post_status = 'published' ";
//
//$select_all_posts_query = mysqli_query($connection, $query);
//
//
////					 check if there are posts
//			
//if(mysqli_num_rows($select_all_posts_query) < 1){
//
//	echo"<h1 class='text-center'>No Posts Available</h1>";
//
//}else{
//
//
//while($row = mysqli_fetch_assoc($select_all_posts_query)){
//
//	$post_id  	 = $row ['post_id'];
//	$post_title  = $row ['post_title'];
//	$post_author = $row ['post_author'];
//	$post_user 	 = $row ['post_user'];
//	$post_date   = $row ['post_date'];
//	$post_time   = $row ['post_time'];
//	$post_image  = $row ['post_image'];
//
//	//DISPLAT LESS CONTENT IN HOME PAGE USING substr( content   ,characters from, charaters to)
//
//	$post_content  = substr($row['post_content'], 0,100);


?>
                
                
                <h1 class="page-header">
                 Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                
                
                  <!-- When the user click the post this link P_id echo te all related posts  -->  
                
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_user ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>"<?php echo $post_id ?> alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


<?php endwhile;  }else{
			
			header("Location: index.php");
			
			

		} 
				
				
				?>
                    

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
                
                
                <?php include "includes/sidebar.php";  ?>
                

        </div>
        <!-- /.row -->

        <hr>

    <?php include "includes/footer.php";  ?>