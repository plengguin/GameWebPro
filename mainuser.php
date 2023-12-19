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
    <!-- Banner Start-->

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

    <!-- Banner End -->
    <!-- What's new -->
    
    <h1 class="heading">What's new</h1>
    
    <?php
        $select_ngame = $conn->prepare("SELECT * FROM `game` ORDER BY Upload_Date DESC LIMIT 5");
        $select_ngame->execute();
        $games = $select_ngame->fetchAll(PDO::FETCH_ASSOC);

        if ($games && count($games) > 0) {
            ?>
            <section class="slide-card">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($games as $game) : ?>
                            <div class="card">
                                <a href="gameplayuser.php?get_GameID=<?= $game['GameID']; ?>">
                                <span><p class="des"><i class="name"></i><?= $game['NameOfGame']; ?></p></span>
                                <img src="uploaded_files/<?= $game['GameImage']; ?>" class="Gameimage" alt="">
                                <p class="cate"><i class="fas fa-india-rupee-sign"></i><?= $game['Category']; ?></p>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php
        } else {
            echo '<p class="empty">ไม่พบเกม!</p>';
        }
        ?>
    
                     
    
    <!-- What's new -->
    <!-- Add game information -->
    <h1 class="heading">All Games</h1>
    <section class="games">
        <?php
    $select_game = $conn->prepare("SELECT * FROM `game`");
    $select_game->execute();
    if ($select_game->rowCount() > 0) {
        while ($fetch_game = $select_game->fetch(PDO::FETCH_ASSOC)) {
?>
        <div class="wrapper">
            
                <a href="gameplayuser.php?get_GameID=<?= $fetch_game['GameID']; ?>">
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
    <!-- Add game information -->       
    <script>
    var swiper = new Swiper(".swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
              rotate: 0,
              stretch: 0,
              depth: 100,
              modifier: 2,
              slideShadows: true
            },
            spaceBetween: 60,
            loop: true,
            pagination: {
              el: ".swiper-pagination",
              clickable: true
    }
  });</script>  
</body>
</html>