<?php
    session_start();
    require_once 'components/server.php';

    
?>
<nav>
    
        <div class="logo">
            <a href="mainuser.php">Z8</a>
        </div>
        
        <ul>
            <li><a href="myfav.php">My Favorite</a></li>
            <li>
                <a href="profile.php">Profile</a>
                    <ul class="dropdown">
                        <li><a href="upload.php">Upload</a></li>
                        <li><a href="logout.php">Logout</a></a></li>
                    </ul>
                </li>
        </ul>
</nav>s