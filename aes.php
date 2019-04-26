<?php
        include 'header2.php';
        ?>
        <link rel="stylesheet" href="style/rsa.css">

        <main>

            <!-- Step 2 -->
            <div class="menu-bg">
                <div class="menu-caption">
                    <div class="shadow">
                        <h1 class="display-4">

                            <!-- middle text -->Step #1: Encrypt A Message!
                        </h1>
                        <h6 class="display-4 caption-end">
                            
                        </h6>
                    </div>

                    <form method="POST" action="" class="text-center">
                        <span class="variable-span">Key : <input type="text" class="small-form" name="keyvalue" id="keyvalue" aria-describedby="helpId" placeholder=""></span><br>
                        <span class="variable-span"><input type="text" class="small-form" style="width:30%;text-align:center;margin-top: 10px;" name="encryptMsg" id="encryptMsg" aria-describedby="helpId" placeholder="Text here"></span>
                        <button class="btn btn-outline-warning menu-button"><h4 class="display-4 btn-menu-text">
                        Encrypt Now!
                        </h4></button>
                    </form>
                    <div class="text-center">
                        <h6 class="display-4 caption-end" style="opacity:0.5;">Encrypted Message: </h6> 
                    </div>
                    <div class="text-center">
                        <h6 class="display-10 caption-end">haha r**** sux </h6> 
                    </div>
                    

                    </a>
                </div>
                
                
                
            </div>

            <!-- Step 3 -->
            <div class="menu-bg">
                <div class="menu-caption">
                    <div class="shadow">
                        <h1 class="display-4">

                            <!-- middle text -->Step #2: Decrypt A Message!
                        </h1>
                        <h6 class="display-4 caption-end">
                            
                        </h6>
                    </div>

                    <form method="POST" action="" class="text-center">
                    <span class="variable-span">Key : <input type="text" class="small-form" name="keyvalue" id="keyvalue" aria-describedby="helpId" placeholder=""></span><br>
                        <span class="variable-span"><input type="text" class="small-form" style="width:30%;text-align:center;margin-top: 10px;" name="encryptMsg" id="encryptMsg" aria-describedby="helpId" placeholder="*whisper mumble mumble*!"></span>
                        <button class="btn btn-outline-warning menu-button"><h4 class="display-4 btn-menu-text">
                        Decrypt Now!
                        </h4></button>
                    </form>
                    <div class="text-center">
                        <h6 class="display-4 caption-end" style="opacity:0.5;">Decrypted Message: </h6> 
                    </div>
                    <div class="text-center">
                        <h6 class="display-10 caption-end">haha ricky sux </h6> 
                    </div>
                    

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