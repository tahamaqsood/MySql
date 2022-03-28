<?php

/*
========================
Encryption & Decryption:
========================
*/

// Original Password
$password = "#GrayHat1790.";
echo "Original password is: ".$password;
echo "<br>";



// Now, we will use base64_encode(); function to convert password into encrypted form & store it in encrypt variable.
$encrypt = base64_encode($password);
echo "Password after converting into encrypted form is: ".$encrypt;
echo "<br>";



// Now, we will use base64_decode(); function for decryption of password which is in encrypted form, & store it in decrypt variable.
$decrypt = base64_decode($encrypt);
echo "Password after decryption is: ".$decrypt;
echo "<br>";



/* 
Note: We used base64_encode() function to convert password into encrypted form. And developers use this function
to enhance security. Similary base64_decode() function is used to decode and crack encrypted values.
 */

?>