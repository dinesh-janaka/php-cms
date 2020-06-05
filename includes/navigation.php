<?php session_start(); ?>

  
   
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- MAKING HOMEPAGE INDEX  -->
                <a class="navbar-brand" href="index.php">CMS FRONT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                       
        
            <?php
            
            //display daynamic data from datbase catagories        
            $query = "SELECT * FROM categories";      
           $select_all_categories_query = mysqli_query($connection, $query);
                    
            //$select_all_categories_query = $connection->query($query);        
            
            while($row = mysqli_fetch_assoc($select_all_categories_query)){
             
			$cat_id		= $row['cat_id'];	
            $cat_title = $row ['cat_title'] ;   
                
				
			// dynamic link to categories		
			$category_class = '';
			$registration_class = '';	
			$registration = "registration.php";	
			$contact_class = '';	
			
			$page_name = basename($_SERVER['PHP_SELF']);
				
			if(isset($_GET['category']) && $_GET['category'] == $cat_id){
				
				$category_class = 'active';
				
			}elseif($page_name == $registration){
				
				 $registration_class = 'active';
				
			}	
				
				
				
             echo "<li class='$category_class'><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                
                
            }        
            
					
					
            ?>       
                       
                        <li> <a href="admin">Admin</a></li>
                        
						<li class='<?php echo $registration_class; ?>'>
                       <a href="registration.php">Registration</a></li>
                        
                        <li class='<?php echo $contact_class; ?>'>
                         <a href="contact.php">Contact</a></li>
                
<?php                 
/////////////////// GIVING LOGGED IN USER TO ACCESS EDIT PAGE DIRECTLRY//////////////////////
				
// var_dump($_SESSION);
//	exit();				

if(isset($_SESSION['user_role'])) {

if(isset($_GET['p_id'])) {

  $the_post_id = $_GET['p_id'];

echo "<li><a href='/cms/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";

//echo "<li><a href='/cms/admin/posts.php?source=edit_post&p_id={$the_post_id}'>$cat_title</a></li>";

	
	
	
}

    
    
    }
    
    ?>                               
                 
                
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>