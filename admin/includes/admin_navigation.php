        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
<!--*************ADDING LINK TO USERS ONLINE with php **********************************  -->
<!--               <li><a href="">Users Online: <?php //echo users_online();  ?></a></li>-->
             
<!--************* INSTANT USERS ONLINE with ajex**********************************  -->             
              <li><a href="">Users Online: <span class="usersonline"></span>  </a></li>
               
                       <li> <a href="../index.php">Home site</a></li>
                

                
               
                
                
<!--
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu alert-dropdown">
            <li>
                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
            </li>
            <li>
                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
            </li>
            <li>
                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
            </li>
            <li>
                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
            </li>
            <li>
                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
            </li>
            <li>
                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">View All</a>
            </li>
        </ul>
    </li>
-->
                
                   
                   
                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    
<!--     **********ADDING LINK TO PROFILE DROPDOWN   John Smith             -->
                        
							<?php
							if(isset($_SESSION['username'])){

							echo $_SESSION['username'];	

							}						


							?>                       
                       
                       
                       
                       <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            
                            
                            
                            
                            <a href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post_dropdown"><i class="fa fa-fw fa-arrows-v"></i> posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Posts</a>
                            </li>
                        </ul>
                    </li>

                      <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                                        <li class="">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i>Comments</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>