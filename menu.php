<?php
require 'header.php';
?>

<link rel="stylesheet" href="style/menu.css">

<main>
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
</main>    

<?php
    require 'footer.php';
?>