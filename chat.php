<?php
require 'header.php';
?>

<link rel="stylesheet" href="style/chat.css">

<main>
    

    <div class="container my-4">

        <!-- Page Title -->
        <div class="row my-4">
            <div class="col chatpage-title">
                <h1>Chat Room<br><small class="text-muted">Connect with everyone</small></h1>
            </div>
        </div>

        <!-- Chat Form -->
        <div class="row my-4">
            <div class="col">
                <div class="card">
                    <form method="" action="">
                        <div class="form-group">
                            <label for="InputPostTitle"><strong>Post Title</strong></label>
                            <input type="text" class="form-control" id="InputPostTitle" aria-describedby="PostTitleHelp" placeholder="Enter post title">
                            <small id="PostTitleHelp" class="form-text text-muted">Must be between 5-100 characters</small>
                        </div>
                        <div class="form-group">
                            <label for="InputPostContent"><strong>Post Content</strong></label>
                            <textarea class="form-control" id="InputPostContent" aria-describedby="PostContentHelp" rows="6" placeholder="Write your thoughts here..."></textarea>
                            <small id="PostContentHelp" class="form-text text-muted">Must be between 10-5000 characters</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>    
                </div>
            </div>
        </div>

        <!-- Chat Log -->
        <div class="row my-4">
            <div class="col">
                <div class="card post-log">
                    
                    <h5 class="card-header timestamp">Timestamp</h5>
                    <div class="row rower">
                        <div class="col-2 profile">
                            <div class="card" style="width: 10rem;">
                                <img class="card-img-top" src="" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Username</h5>
                                    <p class="card-text">Join Date.</p>
                                    <p class="card-text">Post #1.</p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="card-body col-10 profile">
                            <h2 class="card-title">Post title</h2>
                            <p class="card-text">This is a stupid content.</p>
                            <a href="#" class="btn btn-primary">Go fk urself</a>
                        </div>
                    </div>
                    
                        
                </div>
            </div>
        </div>


    </div>
</main>

<?php
    require 'footer.php';
?>




<?php

// Retrieve datetime
/*
$sql  = "SELECT * FROM post_table";
$stmt = mysqli_stmt_init($link);
if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: chat.php?error=sqlerror1");
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $datas = array();

    //If there is post
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            array_push($datas, $row);
        }

        print_r($datas);

        foreach($datas as $line) {
            // print_r($uid." ");
            foreach($line as $x)
            {
                print_r($x."<br>");
            }    
            // print_r($datas[0]["post_content"]);
        }
    } 
    else {
        //username NOT found
        header("Location: login.php?error=uidNotFound&uid=".$username);
        exit();
    }

}
*/

// Retrieving Data from DB
/*
        $sql  = "SELECT username, email FROM user";
        $stmt = mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: chat.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $datas = array();


            //If username is found
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    array_push($datas, $row);
                }

                print_r($datas);

                foreach($datas as $line) {
                    // print_r($uid." ");
                    foreach($line as $x)
                    {
                        print_r($x."<br>");
                    }    
                }
                print_r(count($datas)."<br>");
            } 
            else {
                //username NOT found
                header("Location: login.php?error=uidNotFound&uid=".$username);
                exit();
            }

        }
        */
?>