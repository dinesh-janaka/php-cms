<?php include "includes/admin_header.php"; ?>
   
    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        
                      
                                            
       <div class="col-xs-6">
       
       <?php insert_catagories();  ?>
          
           
           

       <!-- Adding categoris   -->
       
       <form action="" method="post">
        <div class="form-group">
        <label for="cat-title">Add Category</label>  
        <input class = "form-control" type = "text" name = "cat_title">
        </div>
        <div class="form-group">  
        <input class="btn btn-primary " type = "submit" name = "submit" value ="Add category">
            
             
       </div>       
       </form>
     
         
<?php  //UPDATE AND INCLUDE QUERY

if(isset($_GET['edit'])){
    
    $cat_id = escape($_GET['edit']);
}            
  include "includes/update_categories.php";         
?>     
                                                                                                          
                                                                                                     
        </div>
       <!--  add category form -->         
       <div class="col-xs-6"> 
                                                        
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <tr>
                        <th>ID</th>
                        <th>Category Title</th>
                    </tr>
                </tr>
            </thead>
            <tbod>

                
                                                 
<?php findAllCategories(); ?>
                
<?php deleteCategories(); ?>
                
               
            
                
            </tbod>
        </table>
            
                    
        </div>       
                </div> 
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php include "includes/admin_footer.php"; ?>
 