<?php 
    include('components/server.php');
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    if(isset($_COOKIE['GameID'])){
        $GameID = $_COOKIE['GameID'];
    } else {
        setcookie('GameID',create_unique_GameID(),time()+60*60*24*30);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/mainuser.css" rel="stylesheet">
    <script src="javas/app.js"></script>
    <title>x8</title>
</head>
<body>
    <!-- Nav Section Start -->
    <?php include 'components/userheader.php';?>
    <!-- Nav Section -->

    <!-- Banner Start-->
    
    <!-- Banner End -->
    <!-- Add game information -->
    <!-- All My Game -->
    <?php
    $fetch_user = array(); // Initialize an empty array
    if (!empty($user_id)) {
        $select_user = $conn->query("SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
        if($select_user->rowCount() > 0){
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
        }
    }
?>
    
    <div class="addgame">
    <a href="Addgame.php"><button class="btnLogin">Add Game</button></a>
    </div>
    <section class="games">
        <table>
            <thead>
                <th>image</th>
                <th>Name of game</th>
                <th>GameCreator</th>
                <th>FilePath</th>
                <th>Description</th>
            </thead>
        </table>
    </section>
    <!-- Add game information -->         
</body>
</html>
