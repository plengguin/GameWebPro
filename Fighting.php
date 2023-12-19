<?php 
    include('components/server.php');
    if(isset($_COOKIE['GameID'])){
        $GameID = $_COOKIE['GameID'];
    }else{
        setcookie('GameID',create_unique_GameID(),time()+60*60*24*30);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/web-main.css" rel="stylesheet">
    <script src="javas/slide.js"></script>
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
    <!-- Add game information -->
    <h1 class="heading">Fighting</h1>
    <section class="games">
        <?php
    $select_game = $conn->prepare("SELECT * FROM `game` WHERE Category LIKE '%Fighting%'");
    $select_game->execute();
    if ($select_game->rowCount() > 0) {
        while ($fetch_game = $select_game->fetch(PDO::FETCH_ASSOC)) {
?>
        <div class="wrapper">
            
                <a href="gameplay.php?get_GameID=<?= $fetch_game['GameID']; ?>">
                    <div class="all-card">
                        <form action="" method="POST">
                            <img src="uploaded_files/<?= $fetch_game['GameImage']; ?>" class="Gameimage" alt="">
                            <div class="cardInfo">
                            <div class="front">
                            <p class="des"><i class="fas fa-india-rupee-sign"></i><?= $fetch_game['NameOfGame']; ?></p>
                            <p class="des"><i class="fas fa-india-rupee-sign"></i><?= $fetch_game['Category']; ?></p>
                            </div>
                            
                            <div class="back">
                            <p><?= $fetch_game['GameDescription'] ?></p>
                            </div>
                            </div>
                        </form>
                    </div>
                </a>
            
        </div>
<?php
        }
    }
?>
</div>
     
</body>
</html>