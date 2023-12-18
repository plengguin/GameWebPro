<?php
    $dbname = "mysql:host=localhost;dbname=gameupload";
    $db_user_name = "root";
    $db_user_pass = "";
    

    //Create Connection
    $conn = new PDO($dbname,$db_user_name,$db_user_pass);

    function create_unique_GameID(){
        $charecters =
        '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charecters_lenght = strlen($charecters);
        $random = '';
        for($i = 0; $i < 20; $i++){
            $random = $charecters[mt_rand(0,$charecters_lenght -1)];
        }
        return $random;
    }
?>