<?php 
    include('components/server.php');

    if(isset($_COOKIE['GameID'])){
        $GameID = $_COOKIE['GameID'];
    }else{
        setcookie('GameID',create_unique_GameID(),time()+60*60*24*30);
    }

    if(isset($_GET['get_GameID'])){
        $get_GameID = $_GET['get_GameID'];
     }else{
        $get_GameID = '';
        header('location:main.php');
     }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/gameplay.css" rel="stylesheet">
    <script src="javas/app.js"></script>
    <title>x8</title>
</head>
<body>
    <!-- Nav Section Start -->
    <?php include 'components/header.php';?>
    <!-- Nav Section -->
    <!-- Banner Start-->

    <div class="filter-wrapper">
      
      <div id="buttons">
        <a href="Action.php"><button class="button-value" onclick="filterProduct('Action and Adventure Games')">
          Action and Adventure Games
        </button>
        </a>
        <a href="Driving.php">
        <button class="button-value" onclick="filterProduct('Driving')">
            Driving
        </button>
        </a>
        <a href="Fighting.php">
        <button class="button-value" onclick="filterProduct('Fighting')">
            Fighting
        </button>
        </a>
        <a href="forgirl.php">
        <button class="button-value" onclick="filterProduct('For girls')">
        For girls
        </button>
        </a>
        <a href="Shooting.php">
        <button class="button-value" onclick="filterProduct('Shooting')">
        Shooting
        </button>
        </a>
        <a href="Sports.php">
        <button class="button-value" onclick="filterProduct('Sports')">
        Sports
        </button>
        </a>
        <a href="Other.php">
        <button class="button-value" onclick="filterProduct('Other')">
        Other
        </button>
        </a>
        </div></div>

    <!-- Banner End -->
    <?php
        $select_game = $conn->prepare("SELECT * FROM `game` WHERE GameID = ? LIMIT 1");
        $select_game->execute([$get_GameID]);
        if($select_game-> rowCount()>0){ 
            while($fetch_game = $select_game-> fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="gamebox">
    <h1 class="heading"><?= $fetch_game['NameOfGame']; ?></h1>
    <div class="game-screen">
    <iframe src=<?= $fetch_game['FilePath']; ?> scrolling="no" class="screen"> </iframe>
    </div> 
    
    <button class="btndesc">Description</button>
    
    </div>


        <?php }}else {
    echo '<p class="empty">no game found!</p>';
} ?>
</body>
</html>