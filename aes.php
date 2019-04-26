<?php
    include 'header.php';
/* TODO
 * [V] Encryption Code
 * [V] Decryption Code
 * [V] Encryption Error-Handling
 * [V] Decryption Error-Handling
 */
    $key = "";
    $eInput   = "";
    $eRes     = "";

    $dInput   = "";
    $dRes     = "";

    if(isset($_GET['key'])) {
        $key = $_GET['key'];
    }
    if(isset($_GET['eText'])) $eInput = $_GET['eText'];
    if(isset($_GET['eRes'])) {
        $eRes = $_GET['eRes'];
        $dInput = $eRes;
    }  
    
    if(isset($_GET['dText'])) $dInput = $_GET['dText'];
    if(isset($_GET['dRes'])) {
        $dRes = $_GET['dRes'];
        $eInput = $dRes;
    }
?>
<link rel="stylesheet" href="style/rsa.css">

<main>

    <!-- Encryption -->
    <div class="menu-bg">
        <div class="menu-caption">
            <div class="shadow">
                <h1 class="display-4">

                    <!-- middle text -->Encrypt A Message!
                </h1>
                <h6 class="display-4 caption-end">
                    
                </h6>
            </div>

            <form method="POST" action="AES-encryption.php" class="text-center">
                <span class="variable-span">Key : <input type="text" class="small-form" name="keyValue" id="keyValue" aria-describedby="helpId" value="<?php echo $key ?>"></span><br>
                <span class="variable-span"><input type="text" class="small-form" name="plainText" id="plainText" style="width:30%;text-align:center;margin-top: 10px;" aria-describedby="helpId" placeholder="Enter PlainText" value="<?php echo $eInput ?>"></span>
                <button class="btn btn-outline-warning menu-button" name="AES-encrypt"><h4 class="display-4 btn-menu-text">
                Encrypt Now!
                </h4></button>
            </form>
            <div class="text-center">
                <h6 class="display-4 caption-end" style="opacity:0.5;">Encrypted Message: </h6> 
            </div>
            <div class="text-center">
                <h6 class="display-10 caption-end"><?php echo $eRes ?></h6> 
            </div>
            

            </a>
        </div>
        
        
        
    </div>

    <!-- Decryption -->
    <div class="menu-bg">
        <div class="menu-caption">
            <div class="shadow">
                <h1 class="display-4">

                    <!-- middle text -->Decrypt A Message!
                </h1>
                <h6 class="display-4 caption-end">
                    
                </h6>
            </div>

            <form method="POST" action="AES-encryption.php" class="text-center">
            <span class="variable-span">Key : <input type="text" class="small-form" name="keyValue" id="keyValue" aria-describedby="helpId" placeholder="" value="<?php echo $key ?>"></span><br>
                <span class="variable-span"><input type="text" class="small-form" name="cipherText" id="cipherText" style="width:30%;text-align:center;margin-top: 10px;" id="encryptMsg" aria-describedby="helpId" placeholder="Enter The CipherText" value="<?php echo $dInput ?>"></span>
                <button class="btn btn-outline-warning menu-button" name="AES-decrypt"><h4 class="display-4 btn-menu-text">
                Decrypt Now!
                </h4></button>
            </form>
            <div class="text-center">
                <h6 class="display-4 caption-end" style="opacity:0.5;">Decrypted Message: </h6> 
            </div>
            <div class="text-center">
                <h6 class="display-10 caption-end"><?php echo $dRes ?></h6> 
            </div>
            

            </a>
        </div>
        
        
        
    </div>
    

</main>

<?php
    require 'footer.php';
?>