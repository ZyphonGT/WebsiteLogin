<?php
require 'header.php';
$titleField = "";
$contentField = "";

if(isset($_GET['title'])) {
    $titleField = $_GET['title'];
}

if(isset($_GET['content'])) {
    $contentField = $_GET['content'];
}
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

        <!-- Alert Box -->
        <?php 
          //Error Handling
          if(isset($_GET['error'])) {
            if($_GET['error'] == "emptyfields") {
              echo '<div class="alert alert-warning">That is not interesting enough to post...</div>';
            } else if($_GET['error'] == "invalidTitle") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Title must be between 5-100 characters</div>';
            } else if($_GET['error'] == "invalidContent") {
              echo '<div class="alert alert-danger"><strong>Error! </strong>Post content must be between 10-5000 characters</div>';
            } else {
              echo '<div class="alert alert-danger">Uncatched Error! Contact developers.</div>';
            }
            //Post Successful.
          } else if(isset($_GET['chat'])) {
            if($_GET['chat'] == 'success') {
              echo '<div class="alert alert-success"><strong>Success!</strong> Your post is now online!</div>';
            }
          }
          ?>

        <!-- Chat Form -->
        <div class="row my-4">
            <div class="col">
                <div class="card">
                    <form method="POST" action="do_chat.php">
                        <div class="form-group">
                            <label for="InputPostTitle"><strong>Post Title</strong></label>
                            <input type="text" class="form-control" name="InputPostTitle" id="InputPostTitle" aria-describedby="PostTitleHelp" placeholder="Enter post title" value="<?php echo $titleField ?>">
                            <small id="PostTitleHelp" class="form-text text-muted">Must be between 5-100 characters</small>
                        </div>
                        <div class="form-group">
                            <label for="InputPostContent"><strong>Post Content</strong></label>
                            <textarea class="form-control" name="InputPostContent" id="InputPostContent" aria-describedby="PostContentHelp" rows="6" placeholder="Write your thoughts here..."><?php echo $contentField ?></textarea>
                            <small id="PostContentHelp" class="form-text text-muted">Must be between 10-5000 characters</small>
                        </div>

                        <?php
                            //Not Logged In
                            if(!isset($_SESSION['uid'])) {
                                echo    '<button type="" class="btn btn-primary" aria-describedby="true" disabled >Post</button>
                                <small style="display:inline; color:#ff0033;" id="SubmitContentHelp" class="form-text"> You must be signed in to post!</small>';
                            //Logged In
                            } else {
                                echo    '<button type="submit" class="btn btn-primary" name="chat-submit" aria-describedby="SubmitContentHelp">Post</button>
                                <small style="display:inline;" id="SubmitContentHelp" class="form-text text-muted"> You will be posting as '.strtoupper($username).'</small>';
                            }
                        ?>
                        <!--
                        <button type="submit" class="btn btn-primary" name="chat-submit" aria-describedby="SubmitContentHelp">Post</button>
                        <small style="display:inline;" id="SubmitContentHelp" class="form-text text-muted"> You will be posting as <?php echo strtoupper($username)?></small>

                        <button type="" class="btn btn-primary" aria-describedby="true" disabled >Post</button>
                        <small style="display:inline; color:#ff0033;" id="SubmitContentHelp" class="form-text"> You must be signed in to post!</small>
                        -->
                    </form>    
                </div>
            </div>
        </div>

        <!-- Chat Log -->
       <!-- 
        <div class="row my-4">
            <div class="col">
                <div class="card post-log">
                    <h5 class="card-header timestamp">2019-03-16 12:02:37</h5>
                    <div class="row rower">
                        <div class="col-2 profile">
                            <div class="card" style="width: 10rem;">
                                <div class="card-body">
                                    <h5 class="card-title">RickyGani</h5>
                                    <img class="card-img-top" src="img/default_profile.jpg" alt="Card image cap">
                                    <p class="card-text"><strong>Join Date</strong>:<br>2019-10-10</p>
                                    <p class="card-text"><strong>Posts</strong>: <br>1</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body col-10 profile">
                            <h2 class="card-title">sadasdaw</h2>
                            <hr>
                            <p class="card-text">Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         -->
        
        <?php
        //  Retrieve DB

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
                    // print_r($datas);
                    // print_r(count($datas));

                    //uid, post_title, post_content, datetime
                    // BEGIN GENERATING CARDS
                    for($i = count($datas)-1; $i>=0; $i--) {
                        // print_r($datas[$i]["uid"]);
                        echo '  <div class="row my-4">
                                    <div class="col">
                                        <div class="card post-log">
                                            <h5 class="card-header timestamp">'.$datas[$i]["datetime"].'</h5>
                                            <div class="row rower">
                                                <div class="col-2 profile">
                                                    <div class="card" style="width: 10rem;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">'.$datas[$i]["uid"].'</h5>
                                                            <img class="card-img-top" src="img/default_profile.jpg" alt="Card image cap">
                                                            <p class="card-text"><strong>Join Date</strong>:<br>2019-10-10</p>
                                                            <p class="card-text"><strong>Posts</strong>: <br>1</p>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card-body col-10 profile">
                                                    <h2 class="card-title">'.$datas[$i]["post_title"].'</h2>
                                                    <hr>
                                                    <p class="card-text">'.$datas[$i]["post_content"].'</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    }

                    /*
                    foreach($datas as $line) {
                        // print_r($uid." ");
                        foreach($line as $x)
                        {
                            print_r($x."<br>");
                        }    
                        print_r("<br>");
                        // print_r($datas[0]["post_content"]);
                    }
                    */
                } 
                else {
                    //post_table is empty
                    header("Location: chat.php?error=noPostFound&title=".$postTitle."&content=".$postContent);
                    exit();
                }

            }
        ?>

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