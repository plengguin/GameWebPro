    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=gameupload", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        function create_unique_GameID() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $characters_length = strlen($characters);
            $random = '';
            for ($i = 0; $i < 20; $i++) {
                $random = $characters[mt_rand(0, $characters_length - 1)];
            }
            return $random;
        }
    ?>