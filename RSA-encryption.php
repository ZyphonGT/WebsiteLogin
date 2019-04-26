<head>
    <meta charset="utf-8">

    <title>RSA Calculator by Syed Umar Anis</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    
</head>

<body>
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
        

    </script>

    <header>
        <h1>
            <div id="title">Public Key Cryptography using RSA algorithm</div>
        </h1>
        <div id="author">by: <a href="http://umaranis.com">Syed Umar Anis</a></div>
        <div id="clear"></div>
    </header>
    <br/>
    <article>
        <div>Purpose of the page is to demonstrate how RSA algorithm works - generates keys, encrypts message and decrypts it.</div>
    </article>
    <article id="step1">
        <h1>Step # 1: Generate Private and Public keys</h1>
        <p>Enter two prime numbers below (P, Q), then press calculate:</p>
        <p>P: <input type="text" id="p"> &nbsp; Q: <input type="text" id="q"> &nbsp; &nbsp; &nbsp;<span class="help">Some prime numbers: 11, 13, 17, 19, 23, 29, 191, 193, 197, 199, etc. </span></p>
        <p><input type="button" value="Calculate" onclick="calculate()"/></p>
        <hr/>
        <table>
            <thead>
                <tr>
                    <th>Variable</th>
                    <th>Value</th>
                    <th>Name</th>
                    <th>Formula</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>N</td>
                    <td><input type="text" id="n" readonly/></td>
                    <td>modulus</td>
                    <td>N: P * Q</td>
                    <td class="help">Product of 2 prime numbers</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td><input type="text" id="l" readonly/></td>
                    <td>length</td>
                    <td>L: (p - 1) * (q - 1)</td>
                    <td class="help">Another way of calculating 'L' is to list of numbers from 1 to N, remove numbers which have common factor which
                            N and count the remaining numbers.</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td><input type="text" id="e" onchange="encryptorChanged()"/></td>
                    <td>encryption key</td>
                    <td></td>
                    <td class="help">Find a number between 1 and L that is <a href="https://en.wikipedia.org/wiki/Coprime_integers" target="_blank">coprime</a> with L and N.<span id="enKeyListSpan"></span></td>
                </tr>
                <tr>
                    <td>D</td>
                    <td><input type="text" id="d" onchange="decryptorChanged()"/></td>
                    <td>decryption key</td>
                    <td>D * E mod L = 1</td>
                    <td class="help">Remainder of the product of D and E when divided by L should be 1 (D * E % L = 1)<span id="deKeyListSpan"></span></td>
                </tr>
            </tbody>            
        </table>
        <hr/>
        <section>
            <div class="key">
                <span class="key-label">Private Key (E, N): </span><span id="private-key" class="key-value"></span>
            </div>
            <div class="key">
                <span class="key-label">Public Key (D, N): </span><span id="public-key" class="key-value"></span>
            </div>
        </section>
    </article>
    <article id="step2">
        <h1>Step # 2: Encrypt a message</h1>
        <p>Enter a message to encrypt: <input type="text" id="message"/></p>
        <p><input type="button" value="Encrypt" onclick="encrypt()"/></p>
        <hr/>
        <p>Message converted to ASCII code: <span id="ascii"></span></p>
        <p>Encrypted message: message^E mod N &nbsp; &nbsp; &nbsp;</p>
        <section>
            <div class="key">
                <span class="key-label">Encrypted Message: </span><span id="encrypted-msg" class="key-value"></span>
            </div>                
        </section>
    </article>
    <article id="step2">
        <h1>Step # 3: Decrypt a message</h1>
        <p>Enter a encrypted message (cipher): <input type="text" id="encrypted-msg-textbox"/></p>
        <p><input type="button" value="Decrypt" onclick="decrypt()"/></p>
        <hr/>        
        <p>Message decrypted from ASCII code: <span id="ascii-decrypted"></span></p>
        <p>Decrypted Message: encrypted_message^D mod N &nbsp; &nbsp; &nbsp;</p>
        <section>
            <div class="key">
                <span class="key-label">Decrypted Message: </span><span id="decrypted-msg" class="key-value"></span>
            </div>                
        </section>
    </article>    
</body>

</html>