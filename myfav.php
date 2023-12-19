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
    <link href="css/web-mainuser.css" rel="stylesheet">
    <script src="javas/app.js"></script>
    <title>x8</title>
</head>
<body>
    <!-- Nav Section Start -->
    <?php include 'components/userheader.php';?>
    <!-- Nav Section -->
    <div class="filter-wrapper">
    <div id="buttons">
        <a href="Action copy.php"><button class="button-value" onclick="filterProduct('Action and Adventure Games')">
          Action and Adventure Games
        </button>
        </a>
        <a href="Driving copy.php">
        <button class="button-value" onclick="filterProduct('Driving')">
            Driving
        </button>
        </a>
        <a href="Fighting copy.php">
        <button class="button-value" onclick="filterProduct('Fighting')">
            Fighting
        </button>
        </a>
        <a href="forgirl copy.php">
        <button class="button-value" onclick="filterProduct('For girls')">
        For girls
        </button>
        </a>
        <a href="Shooting copy.php">
        <button class="button-value" onclick="filterProduct('Shooting')">
        Shooting
        </button>
        </a>
        <a href="Sports copy.php">
        <button class="button-value" onclick="filterProduct('Sports')">
        Sports
        </button>
        </a>
        <a href="Other copy.php">
        <button class="button-value" onclick="filterProduct('Other')">
        Other
        </button>
        </a>
        </div></div>
    
    <h1 class="heading">My Favorite</h1>
    <?php
        $select_fav = $conn->prepare("SELECT * FROM `favorite`");
        $select_fav->execute();
        if($select_fav-> rowCount()>0){ while($fetch_fav = $select_fav-> fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="wrapper">
                
                    <a href="gameplay.php?get_GameID=<?= $fetch_fav['game_id']; ?>">
                        <div class="all-card">
                            <form action="" method="POST">
                                <img src="uploaded_files/<?= $fetch_fav['image']; ?>" class="Gameimage" alt="">
                                <div class="cardInfo">
                                <div class="front">
                                <p class="des"><i class="fas fa-india-rupee-sign"></i><?= $fetch_fav['name']; ?></p>
                                <p class="des"><i class="fas fa-india-rupee-sign"></i><?= $fetch_fav['category']; ?></p>
                                </div>
                                
                                <div class="back">
                                <p><?= $fetch_fav['description'] ?></p>
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
    
    <!-- Add game information -->       
    
    

</body>
</html>