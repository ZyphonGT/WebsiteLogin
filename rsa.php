    <?php
        include 'header2.php';
        ?>
        <link rel="stylesheet" href="style/rsa.css">

        <main>
            <div class="menu-bg">
                <div class="menu-caption">
                    <div class="shadow">
                        <h1 class="display-4">

                            <!-- middle text -->Step #1: Generate Private and Public Keys
                        </h1>
                        <h6 class="display-4 caption-end">
                            
                        </h6>
                    </div>

                    <form method="POST" action="" class="text-center group-form">
                        <span class="variable-span" style="left:0px; !important">P : <input type="text" class="small-form" name="pvalue" id="pvalue" aria-describedby="helpId" placeholder="P Value"></span>
                        <span class="variable-span">Q : <input type="text" class="small-form" name="qvalue" id="qvalue" aria-describedby="helpId" placeholder="Q Value"></span>
                        <button class="btn btn-outline-warning menu-button" style="margin-top:25px;"><h4 class="display-4 btn-menu-text">
                        Start Now
                        </h4></button>
                    </form>
                    <div class="text-center">
                        <span class="variable-span">N : <span class="variable-value">12</span></span><br>
                        <span class="variable-span">L : <span class="variable-value">13</span></span><br>
                        <span class="variable-span">E : <span class="variable-value">14</span></span><br>
                        <span class="variable-span">D : <span class="variable-value">15</span></span><br>
                    </div>
                    <div class="text-center">
                    <span class="variable-span">Private Key(E,N): <input type="text" class="small-form" name="publicKey" id="publicKey" aria-describedby="helpId" placeholder=""></span>
                    </div>

                    <div class="text-center">
                    <span class="variable-span">Public Key(D,N): <input type="text" class="small-form" name="privateKey" id="privateKey" aria-describedby="helpId" placeholder=""></span>
                    </div>

                    </a>
                </div>
                
                
                
            </div>

            <!-- Step 2 -->
            <div class="menu-bg">
                <div class="menu-caption">
                    <div class="shadow">
                        <h1 class="display-4">

                            <!-- middle text -->Step #2: Encrypt A Message!
                        </h1>
                        <h6 class="display-4 caption-end">
                            
                        </h6>
                    </div>

                    <form method="POST" action="" class="text-center">
                        <span class="variable-span"><input type="text" class="small-form" name="encryptMsg" id="encryptMsg" aria-describedby="helpId" placeholder="Text here"></span>
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

                            <!-- middle text -->Step #3: Decrypt A Message!
                        </h1>
                        <h6 class="display-4 caption-end">
                            
                        </h6>
                    </div>

                    <form method="POST" action="" class="text-center">
                        <span class="variable-span"><input type="text" class="small-form" name="encryptMsg" id="encryptMsg" aria-describedby="helpId" placeholder="*whisper mumble mumble*!"></span>
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