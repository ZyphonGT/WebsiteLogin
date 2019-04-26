    <?php
        include 'header.php';
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

                    <div class="text-center">
                        Enter two prime numbers below (P, Q), then press Start Now: <br>
                        (2, 3, 5, 7, 11, 13, 17, 19, 23, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 173, 179, 181, 191, 193, 197, 199)
                    </div>
                    
                    <div method="POST" action="" class="text-center group-form">
                        <span class="variable-span" style="left:0px; !important">P : <input type="text" class="small-form" name="pvalue" id="p" aria-describedby="helpId" placeholder="P Value"></span>
                        <span class="variable-span">Q : <input type="text" class="small-form" name="qvalue" id="q" aria-describedby="helpId" placeholder="Q Value"></span>
                        <button class="btn btn-outline-warning menu-button" style="margin-top:25px;"><h4 class="display-4 btn-menu-text" onclick="calculate()">
                        Start Now
                        </h4></button>
                    </div>
                    <div class="text-center">
                        <span class="variable-span">N : <input type="text" style="margin-top:10px;" class="variable-value" id="n" disabled></span><br>
                        <span class="variable-span">L : <input type="text" style="margin-top:10px;" class="variable-value" id="l" disabled></span><br>
                        <span class="variable-span">E : <input type="text" style="margin-top:10px;" class="variable-value" id="e" onchange="encryptorChanged()"></span><span id="enKeyListSpan"></span><br>
                        <span class="variable-span">E : <input type="text" style="margin-top:10px;" class="variable-value" id="d" onchange="decryptorChanged()"></span><span id="deKeyListSpan"><br>
                    </div>

                    <div class="text-center">
                    <span class="variable-span">Private Key(E,N): <span class="small-form key-value" name="publicKey" id="private-key" aria-describedby="helpId" placeholder=""></span>
                    </div>

                    <div class="text-center">
                    <span class="variable-span">Public Key(D,N): <span class="small-form key-value" name="privateKey" id="public-key" aria-describedby="helpId" placeholder=""></span>
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

                    <div class="text-center">
                        <span class="variable-span"><input type="text" class="small-form" name="encryptMsg" id="message" style="width:30%;text-align:center;" aria-describedby="helpId" placeholder="Text here"></span>
                        <button class="btn btn-outline-warning menu-button" onclick="encrypt()"><h4 class="display-4 btn-menu-text">
                        Encrypt Now!
                        </h4></button>
                    </div>
                    <div class="text-center">
                        <h6 class="display-4 caption-end" style="opacity:0.5;">Encrypted Message: <span id="ascii"></span></h6> 
                    </div>
                    <div class="text-center">
                        <h6 class="display-10 caption-end"><span id="encrypted-msg" class="key-value"></span></h6> 
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

                    <div class="text-center">
                        <span class="variable-span"><input type="text" class="small-form" style="width:30%;text-align:center;" name="decryptMsg" id="encrypted-msg-textbox" aria-describedby="helpId" placeholder="*whisper mumble mumble*!"></span>
                        <button class="btn btn-outline-warning menu-button" onclick="decrypt()"><h4 class="display-4 btn-menu-text">
                        Decrypt Now!
                        </h4></button>
                    </div>
                    <div class="text-center">
                        <h6 class="display-4 caption-end" style="opacity:0.5;">Decrypted Message: <span id="ascii-decrypted"></h6> 
                    </div>
                    <div class="text-center">
                        <h6 class="display-10 caption-end"><span id="decrypted-msg" class="key-value"></h6> 
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

                <script>
        "use strict";
        
        var e, d, n, l;

        function validatePrime(prime, nameOfPrime) {
            if(!isPrime(prime)) {
                alert("'" + nameOfPrime + "' is not a prime number. Please enter a prime number.");
                return false;
            }
            if(prime <= 7) {
                alert("'" + nameOfPrime + "' should be greater than 7.");
                return false;
            }
            return true;
        }
        
        function calculate() {
            
            //validations
            var p = document.getElementById("p").value;            
            var q = document.getElementById("q").value;
            if (!(validatePrime(p, "p") && validatePrime(q, "q"))) return; 
            n = p * q;
            document.getElementById("n").value = n;
            
            l = (p - 1) * (q - 1);
            document.getElementById("l").value = l;
            
            var es = findEncryptionKeys(l, n);
            document.getElementById("e").value = es[0];
            document.getElementById("enKeyListSpan").innerHTML = " Possible encryption keys are: " + es;
            encryptorChanged();
        }

        function encryptorChanged() {
            e = document.getElementById("e").value;            

            var ds = findDecryptionKeys(e, l);
            ds.splice(ds.indexOf(e), 1);  //remove encryption key from list
            d = ds[0];
            document.getElementById("d").value = d;
            document.getElementById("deKeyListSpan").innerHTML = " Possible decryption keys are: " + ds;

            document.getElementById("private-key").innerHTML = "(" + e + "," + n + ")";
            document.getElementById("public-key").innerHTML = "(" + d + "," + n + ")";
        }

        function decryptorChanged() {
            d = document.getElementById("d").value;
            document.getElementById("public-key").innerHTML = "(" + d + "," + n + ")";
        }

        function isPrime(num) {
            for (let i = 2, s = Math.sqrt(num); i <= s; i++)
                if (num % i === 0) return false;
            return num !== 1;
        }

        function findEncryptionKeys(l, n) {
            var arr = [];
            for(var i = 2; i < l; i++) {
                if(isCoPrime(i, l) && isCoPrime(i, n))
                    arr.push(i);
                    if(arr.length > 5) break;
            }     
            return arr;
        }

        function isCoPrime(a, b) {            
            var aFac = findFactors(a);
            var bFac = findFactors(b);
            var result = aFac.every(x => bFac.indexOf(x) < 0);
            return result;
        }

        var hashtable = new Object();
        function findFactors(num) {
            if(hashtable[num])
                return hashtable[num];

            var half = Math.floor(num / 2), // Ensures a whole number <= num.
                result = [],
                i, j;

                //result.push(1); // 1 should be a part of every solution but for our purpose of COPRIME 1 should be excluded

            // Determine out increment value for the loop and starting point.
            num % 2 === 0 ? (i = 2, j = 1) : (i = 3, j = 2);

            for (i; i <= half; i += j) {
                num % i === 0 ? result.push(i) : false;
            }

            result.push(num); // Always include the original number.
            hashtable[num] = result;
            return result;
        }

        function findDecryptionKeys(e, l) {
            var ds = [];
            for(var x = l + 1;x < l + 100000; x++) {
                if(x * e % l === 1) {
                    ds.push(x);
                    if(ds.length > 5)   return ds;
                }
            }     
            return ds;
        }

        // calculates   base^exponent % modulus
        function powerMod(base, exponent, modulus) {
            if (modulus === 1) return 0;
            var result = 1;
            base = base % modulus;
            while (exponent > 0) {
                if (exponent % 2 === 1)  //odd number
                    result = (result * base) % modulus;
                exponent = exponent >> 1; //divide by 2
                base = (base * base) % modulus;
            }
            return result;
        }   

        function encrypt() {
            var m = document.getElementById("message").value;
            var ascii = Array.from(Array(m.length).keys()).map(i => m.charCodeAt(i));
            document.getElementById("ascii").innerHTML = ascii;         
            var encrypted = ascii.map(i => powerMod(i, e, n));   
            document.getElementById("encrypted-msg").innerHTML = encrypted;
            document.getElementById("encrypted-msg-textbox").value = encrypted;
        }

        function decrypt() {
            var cipher = stringToNumberArray(document.getElementById("encrypted-msg-textbox").value);
            var ascii = cipher.map(i => powerMod(i, d, n));
            document.getElementById("ascii-decrypted").innerHTML = ascii;
            var message = "";
            ascii.map(x => message += String.fromCharCode(x));
            document.getElementById("decrypted-msg").innerHTML = message;
        }

        function stringToNumberArray(str) {
            return str.split(",").map(i => parseInt(i));
        }

    
        

    </script>

        <?php
            require 'footer.php';
        ?>