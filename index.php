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
				
						$per_page = 3;	


						//*****TAKING THE GET REQUEST for PAGINATION/////////////////				
						if(isset($_GET['page'])){

						$page = $_GET['page'];	

						} else {

						$page = "";	

						}				

						/////*************FINDOUT PAGE 1 ***********************		
						if($page == "" || $page == 1) {

						$page_1 = 0;

						} else {
						////************ASSIGNING EVERY PAGE 5 results********	
						$page_1 = ($page * $per_page) - $per_page;

						}


				
				$whereClause = '';
				//display data from posts BASED ON POST STATUS AND LIMIT Them
				if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin' ) {
					$whereClause = "WHERE post_status = 'published'";
         		}   

				
         $post_query_count = "SELECT * FROM posts {$whereClause}";
        $find_count = mysqli_query($connection,$post_query_count);
        $count = mysqli_num_rows($find_count);

        if($count < 1) {


            echo "<h1 class='text-center'>No posts available</h1>";
		
//				//$post_query_count = "SELECT * FROM posts";
//			
// 					// ****************PAGINATION**********************	
//					$post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";				
//					$find_count = mysqli_query($connection, $post_query_count);
//					$count = mysqli_num_rows($find_count);
//				
//				
//				// check the posts are published ******
//				
//				if($count <1){
//					
//					echo "<h1 class='text-center'>No Posts Avaliable</h1>";
//					
				}else{
				
				
					// MAKE THE COUNT VARIABLE INTO AN integer				
					$count = ceil($count / $per_page);				

				
			
				
                $query = "SELECT * FROM posts {$whereClause} LIMIT $page_1, $per_page";
                $select_all_posts_query = mysqli_query($connection, $query);                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    
                    $post_id  	 = $row ['post_id'];
                    $post_title  = $row ['post_title'];
                    $post_author = $row ['post_author'];
					$post_user	 = $row ['post_user'];
                    $post_date   = $row ['post_date'];
                    $post_tags   = $row ['post_tags'];
                    $post_image  = $row ['post_image'];
		//DISPLAT LESS CONTENT IN HOME PAGE USING substr( content   ,characters from, charaters to)
                    $post_content  = substr($row['post_content'], 0,100);
        
					$post_status = $row ['post_status'];

					
//					 //display data from posts BASED ON POST sTATUS
//					
			//	if($post_status == 'published'){
	    
				
                
?>
                
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                
<!--    <h1><?php// echo $count; ?> </h1>               -->
             
                  <!-- When the user click the post this link P_id echo to all related posts  -->  
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                
                </h2>
                <p class="lead">
                   
                   
                         
<!-- ************CREATING LINK TO DISPLAY ALL POSTS FROM AUTHOR********** -->
                    
                    by <a href="author_posts.php?author=<?php echo $post_user?>&p_id=<?php echo $post_id ?>"><?php echo $post_user ?></a>
                
            
                 
                    
                        
                                
                
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                
                
                <a href="post.php?p_id=<?php echo $post_id ?>">
				<img class="img-responsive" src="images/<?php echo $post_image;?>"  alt=""></a>
                <hr>
                
                
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                
<?php  } } ?>


   
      
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
        
        
<!--*****************DISPLAY PAGINAATION*******************        -->
        
<ul class="pager">
<?php

	for($i=1; $i <= $count; $i++){
		
		
		
//**************MAKING STYLES TO PAGE NUMbERS ******************
if($i == $page){
	
echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li> "	;	

} else {
	
////*****************GET REQUEST page TO ASSIGN THE VALUE OF COUNT ********************		
	echo "<li><a href='index.php?page={$i}'>{$i}</a></li> "	;
	
	
}		
	
	
}

?>


<!--	/jjdjkhsd\ghvlh-->
	
	
</ul>        
        
        
        
        

    <?php include "includes/footer.php";  ?>