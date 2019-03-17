<?php
require 'header.php';
?>
<link rel="stylesheet" href="style/menu.css">

<main>
    <div class="menu-bg">
        <div class="menu-caption">
            <div class="shadow">
                <h1 class="display-4">

                    <?php
                        if(!isset($_SESSION['uid'])){
                            echo 'Join the discussion now!';
                        } else{
                            echo 'Welcome back, '.$username.'!';
                        }
                    ?>
                </h1>
                <h6 class="display-4 caption-end">We are currently <strong><?php echo countUsers()?> users</strong> and <strong><?php echo countPosts()?> posts</strong> strong!</h6>
            </div>
            
            <a href="chat.php">
            <button class="btn btn-outline-warning menu-button"><h4 class="display-4 btn-menu-text">
                Start Now
            </h4></button>
            </a>
        </div>
        
    </div>

</main>

<!-- 
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header">Welcome <?php echo $username; ?>!</h4>
                    <div class="card-body">
                        <h4 class="card-title"><a href="menu.php">Link #1</a></h4>
                    </div>
					<div class="card-body">
                        <h4 class="card-title"><a href="menu.php">Link #2</a></h4>
                    </div>
					<div class="card-body">
                        <h4 class="card-title"><a href="do_logout.php">Logout</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
 -->

<?php
    require 'footer.php';
?>