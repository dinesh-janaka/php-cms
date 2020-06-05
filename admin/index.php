<?php include "includes/admin_header.php" ?>
  

    <div id="wrapper">
        
        
<?php
	
        
?>        
        
        
        

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            
                                                       
                      <small><?php  
						  
						  if(isset($_SESSION['username'])) {

                            echo $_SESSION['username'];
						  }
						?>	  
					</small>
                      </h1>
                       
<!--
                       <h1>
                       <?php //echo $count_user; ?>
                        </h1>
                        
                        
-->
               </div>
                </div>
                <!-- /.row -->
       
<!-- /////////////////////////////// ADMIN DASH BOARD //////////////////////////-->
       
                              
                                                    
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  
                       
<?php
////////////////////////ADDING DYNAMIC POSTS/////////////////////////////////////			
//$query = "SELECT * FROM posts ";
//$select_all_post = mysqli_query($connection, $query);
//						
////////	COUNT ROWS FUNCTION///////
//
//$post_count = mysqli_num_rows($select_all_post);

//echo "<div class='huge'>{$post_count}</div>";

?>						

<!--/********** calling the function************************************-->
	<div class='huge'><?Php echo $post_count = recordCount('posts');  ?></div>
<!--/********** calling the function************************************-->
						
						
						
							
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
<?php
////////////////////////ADDING DYNAMIC COMMENTS /////////////////////////////////////			
//$query = "SELECT * FROM comments ";
//$select_all_comment = mysqli_query($connection, $query);
//						
////////	COUNT ROWS FUNCTION///////
//
//$comment_count = mysqli_num_rows($select_all_comment);
//
//echo "<div class='huge'>{$comment_count}</div>";
//
?>			

          <!--/********** calling the function************************************-->
	<div class='huge'><?Php echo $comment_count = recordCount('comments');  ?></div>
<!--/********** calling the function************************************-->
          
                                                            
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
<?php
//////////////////////////ADDING DYNAMIC USERS   /////////////////////////////////////			
//$query = "SELECT * FROM users ";
//$select_all_users = mysqli_query($connection, $query);
//						
////////	COUNT ROWS FUNCTION///////
//
//$user_count = mysqli_num_rows($select_all_users);
//
//echo "<div class='huge'>{$user_count}</div>";
//
?>			

     <!--/********** calling the function************************************-->
	<div class='huge'><?Php echo $user_count = recordCount('users');  ?></div>
<!--/********** calling the function************************************-->
                  
                                              
                                                                                            
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
<?php
//////////////////////////ADDING DYNAMIC CATEGORIES /////////////////////////////////////			
//$query = "SELECT * FROM categories ";
//$select_all_category = mysqli_query($connection, $query);
//						
////////	COUNT ROWS FUNCTION///////
//
//$category_count = mysqli_num_rows($select_all_category);
//
//echo "<div class='huge'>{$category_count}</div>";
//
?>			

                                               
   <!--/********** calling the function************************************-->
	<div class='huge'><?Php echo $category_count = recordCount('categories');  ?></div>
<!--/********** calling the function************************************-->
                                                                                           
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->                
         
<?php
//////////INSERT IN TO PUBLISHED POSTS/////////////////
				
//$query = "SELECT * FROM posts WHERE post_status = 'published' ";
//$select_all_published_posts = mysqli_query($connection, $query);
//$published_post_count = mysqli_num_rows($select_all_published_posts);				

$published_post_count = checkStatus('posts', 'post_status', 'published');				
				
//////////INSERT IN TO DRAFT POSTS/////////////////
				
//$query = "SELECT * FROM posts WHERE post_status = 'draft' ";
//$select_all_draft_posts = mysqli_query($connection, $query);
//$post_draft_count = mysqli_num_rows($select_all_draft_posts);				

$post_draft_count = checkStatus('posts', 'post_status', 'draft');				
				
//////////INSERT IN TO UNAPPROVED COMMENTS/////////////////
//$query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
//$unapproved_comments_query = mysqli_query($connection, $query);
//$unapproved_comments_count = mysqli_num_rows($unapproved_comments_query);				

$unapproved_comments_count = checkStatus('comments', 'comment_status', 'unapproved');				
				
				
//////////INSERT IN TO USERS/////////////////
//$query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
//$select_all_subscribers = mysqli_query($connection, $query);
//$subscriber_count = mysqli_num_rows($select_all_subscribers);				
				
$subscriber_count = checkUserRole('users', 'user_role', 'subscriber');				
				
				
?>				
                
                
                
 <!-----------------CHART COPIED FROM GOOGLE CHARTS---------------->               
                <div class= "row"> 
                
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
			
<?Php			
			
$element_text = ['All Posts','Active Posts', 'Draft Posts','Comments','Pending Comments','Users','Subscribers','Categories'];
$element_count = [$post_count,$published_post_count, $post_draft_count, $comment_count, $unapproved_comments_count, $user_count, $subscriber_count, $category_count];
			
			
for($i=0; $i<8; $i++){
	
echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
//////////////// THE ARRAY WORKS LIKE	['Post', 1000],   //////////////////////////////////////		
	
	
	
}			
		
			
?> 			
			
	
         
]);
        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
               
  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
              
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php include "includes/admin_footer.php"; ?>
 