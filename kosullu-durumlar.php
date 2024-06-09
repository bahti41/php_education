<?php

$userName = "bahtiyarSonmez";
$password = "1234";

// if($userName == "bahtiyarSonmez" and $password ==  "1234"){
//     echo"userName ve parola Dogru.";

// }else{
//     echo"userName veya parola Yanlış!!!";
// }

// if($userName == "bahtiyarSonmez"){
    
//     if($password == "1234"){
//         echo "giriş başarili";
//     }else{
//         echo "parola yanlış";
//     }

// }else{
//     echo"userName Yanlış!!!";
// }


if( $userName != "bahtiyarSonmez"){
    echo "userName Yanlıs!!";
}elseif($password != "1234"){
    echo "parola Yanlış!!";
} else {
    echo "giriş Başarılı";
}


?>