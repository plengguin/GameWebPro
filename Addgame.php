<?php
    include('components/server.php');

    if(isset($_COOKIE['GameID'])){
        $GameID = $_COOKIE['GameID'];
    }else{
        setcookie('GameID',create_unique_GameID(),time()+60*60*24*30);
    }

    if (isset($_POST['add_game'])) {
        $NameOfGame = filter_var($_POST['NameOfGame'], FILTER_SANITIZE_STRING);
        $GameCreator = filter_var($_POST['GameCreator'], FILTER_SANITIZE_STRING);
        $FilePath = filter_var($_POST['FilePath'], FILTER_SANITIZE_STRING);
        $UploadDate = filter_var($_POST['UploadDate'], FILTER_SANITIZE_STRING);
        $GameDescription = filter_var($_POST['GameDescription'], FILTER_SANITIZE_STRING);
        $Length = filter_var($_POST['Length'], FILTER_SANITIZE_STRING);

        $GameImage = $_FILES['GameImage']['name'];
        $GameImage = filter_var($GameImage, FILTER_SANITIZE_STRING);
        $ext = pathinfo($GameImage, PATHINFO_EXTENSION);
        $rename = create_unique_GameID() . '.' . $ext;
        $image_tmp_name = $_FILES['GameImage']['tmp_name'];
        $image_size = $_FILES['GameImage']['size'];
        $image_folder = 'uploaded_files/' . $rename;

        $warning_msg = array();
        $success_msg = array();

        if ($image_size > 2000000) {
            $warning_msg[] = 'Image size is too large!';
        } else {
            $insert_game = $conn->prepare("INSERT INTO `game` (GameID, NameOfGame, GameCreator,
            FilePath, UploadDate, GameDescription, Length, GameImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            
            $GameID = 'YourGameID';
            $insert_game->execute([$GameID, $NameOfGame, $GameCreator, $FilePath, $UploadDate, $GameDescription, $Length, $rename]);
            $success_msg[] = 'Game uploaded!';
            move_uploaded_file($image_tmp_name, $image_folder);
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/addgames.css" rel="stylesheet">
    <title>x8</title>
</head>
<body>
    <!-- Nav Section Start -->
    <?php include 'components/header.php';?>
    <!-- Nav Section -->

    <!-- Add -->
    <section class="add-game">
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Game Details</h3>
            <p>Game Name <span>*</span></p>
            <input type="text" name="NameOfGame" required maxlength="50" placeholder="Enter Game" class="box">
            <p>Game Creator Name <span>*</span></p>
            <input type="text" name="GameCreator" required maxlength="50" placeholder="Enter Game Creator" class="box">
            <p>Game Link<span>*</span></p>
            <input type="text" name="FilePath" required  placeholder="Enter Game Link" class="box">
            <p>Upload Date<span>*</span></p>
            <input type="date" name="UploadDate" required  placeholder="Enter Game Upload Date" class="box">
            <p>Game Description/How to play <span>*</span></p>
            <input type="text" name="GameDescription" required maxlength="350" placeholder="Enter Game Description" class="box-desc">
            <p>Game Length<span>*</span></p>
            <input type="number" name="Length" required maxlength="50" placeholder="Enter Game Length" class="box">
            <p>Game Image<span>*</span></p>
            <input type="file" name="GameImage" required accept="image/*" class="box">
            <input type="submit" value="Add game" name="add_game" class="btn">
        </form>
    </section>
    <!-- Add -->
    
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="javas/script.js"></script>
<?php include 'components/alert.php'; ?>
</body>
</html>