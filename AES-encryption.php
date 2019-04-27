<?php

/*
$inputText = "dI5Y4U390K1y7Eigq6hFGA==";
$inputKey = "global";
$blockSize = 128;
$aes = new AEScoder($inputText, $inputKey, $blockSize);

// $enc = $aes->encrypt();
// $aes->setData($enc);
$dec=$aes->decrypt();

// echo "After encryption: ".$enc."<br/>";
echo "After decryption: ".$dec."<br/>";
*/

if(isset($_POST['AES-encrypt'])) {
    $key        = $_POST['keyValue'];
    $plainText  = $_POST['plainText'];

    /******************
	* Error Handling *
    ******************/

    //Empty Fields
    if(empty($key) || empty($plainText)) {
        header("Location: aes.php?error=emptyfields&key=".$key."&eText=".$plainText);
        exit();
    } else {
        $aes = new AEScoder($plainText, $key, 128);
        $enc = $aes->encrypt();

        header("Location: aes.php?success=encrypt&key=".$key."&eText=".$plainText."&eRes=".urlencode($enc));
    }


} else if(isset($_POST['AES-decrypt'])) {
    $key        = $_POST['keyValue'];
    $cipherText  = $_POST['cipherText'];

    /******************
	* Error Handling *
    ******************/

    //Empty Fields
    if(empty($key) || empty($cipherText)) {
        header("Location: aes.php?error=emptyfields&key=".$key."&dText=".$cipherText);
        exit();
    } else {
        $aes = new AEScoder($cipherText, $key, 128);
        $dec = $aes->decrypt();

        header("Location: aes.php?success=decrypt&key=".$key."&dText=".$cipherText."&dRes=".$dec);
    }


}

/**
 * Aes encryption
*/
class AEScoder {
   
    protected $key;
    protected $data;
    protected $method;
    /**
     * Available OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING
     *
     * @var type $options
     */
    protected $options = 0;
    /**
     * 
     * @param type $data
     * @param type $key
     * @param type $blockSize
     * @param type $mode
     */
    function __construct($data = null, $key = null, $blockSize = null, $mode = 'CBC') {
        $this->setData($data);
        $this->setKey($key);
        $this->setMethod($blockSize, $mode);
    }
    /**
     * 
     * @param type $data
     */
    public function setData($data) {
        $this->data = $data;
    }
    /**
     * 
     * @param type $key
     */
    public function setKey($key) {
        $this->key = $key;
    }
    /**
     * CBC 128 192 256 
     * CBC-HMAC-SHA1 128 256
     * CBC-HMAC-SHA256 128 256
     * CFB 128 192 256
     * CFB1 128 192 256
     * CFB8 128 192 256
     * CTR 128 192 256
     * ECB 128 192 256
     * OFB 128 192 256
     * XTS 128 256
     * @param type $blockSize
     * @param type $mode
     */
    public function setMethod($blockSize, $mode = 'CBC') {
        if($blockSize==192 && in_array('', array('CBC-HMAC-SHA1','CBC-HMAC-SHA256','XTS'))){
            $this->method=null;
             throw new Exception('Invlid block size and mode combination!');
        }
        $this->method = 'AES-' . $blockSize . '-' . $mode;
    }
    /**
     * 
     * @return boolean
     */
    public function validateParams() {
        if ($this->data != null &&
                $this->method != null ) {
            return true;
        } else {
            return FALSE;
        }
    }
//it must be the same when you encrypt and decrypt
     protected function getIV() {
        return '1234567890123456';
         //return mcrypt_create_iv(mcrypt_get_iv_size($this->cipher, $this->mode), MCRYPT_RAND);
         return openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));
     }
    /**
     * @return type
     * @throws Exception
     */
    public function encrypt() {
        if ($this->validateParams()) {                                                           
                                                                                                    // What and Why IV? https://stackoverflow.com/a/39412887/6497363
            return trim(openssl_encrypt($this->data, $this->method, $this->key, $this->options,$this->getIV()));
        } else {
            throw new Exception('Invlid params!');
        }
    }
    /**
     * 
     * @return type
     * @throws Exception
     */
    public function decrypt() {
        if ($this->validateParams()) {
           $ret=openssl_decrypt($this->data, $this->method, $this->key, $this->options,$this->getIV());
          
           return   trim($ret); 
        } else {
            throw new Exception('Invlid params!');
        }
    }
}