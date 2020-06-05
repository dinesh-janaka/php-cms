<?php  include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>




 <!-- Navigation -->
     
<?php include "includes/navigation.php";   ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


<?php    

		//CATCH THE P_ID FROM INDEX.php                
		if(isset($_GET['p_id'])){

		$the_post_id = $_GET['p_id'];

		///////GETTING THE URL LINK author=Dinesh&p_id=2//////////	
		$the_post_author = $_GET['author'];	

		}                
                
                
//display data from Author posts

$query = "SELECT * FROM posts WHERE post_user = '{$the_post_author}' ";
$select_all_posts_query = mysqli_query($connection, $query);


while($row = mysqli_fetch_assoc($select_all_posts_query)){

$post_title  = $row ['post_title'];
$post_user = $row ['post_user'];
$post_date   = $row ['post_date'];
$post_time   = $row ['post_time'];
$post_image  = $row ['post_image'];
$post_content  = $row ['post_content'];
	
$post_id  = $row ['post_id'];

?>
                
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                   All Posts by <?php echo $post_user ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                
                <hr>

                
        <?php   } ?>
                   
			<!-- BLOG COMMENTS -->                 
			<?php
			//CATCHING COMMENTS
			if(isset($_POST['create_comment'])){

				$the_post_id     = escape($_GET['p_id']);

				$comment_author  = escape($_POST['comment_author']);
				$comment_email   = escape($_POST['comment_email']);
				$comment_content = escape($_POST['comment_content']);

	
	
////////////*************************CHECK THE COMMENT FIELD IS EMPTY*************///////////////////	
	
if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
	
	
	$query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
	
	$query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";
	
	
	$create_comment_query = mysqli_query($connection, $query);
	
	if(!$create_comment_query){
		
		die("QUERY FAILED" . mysqli_error($connection));
		
		
	}
	
//MAKE post_comment_count DYNAMIC
	
$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
$query.= "WHERE post_id = $the_post_id ";	
$update_post_comment_count = mysqli_query($connection, $query);
	
if (!$update_post_comment_count) {
                die('QUERY FAILED' . mysqli_error($connection));
	
	
}
}else{
	
echo "<script>alert('Fields can not be empty')</script>";
	
	
}
  	
	
}	
	
    
              
                
?>     
				
				
				
	           
                
               

                <!-- Comment -->
              
               
                   
                  
                   
                    

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