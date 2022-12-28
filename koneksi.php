<html>
    <head>
        <title>Koneksi Database MySQL</title>
    </head>
    <body>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "baleclassy";
        
        $koneksi = mysqli_connect($host, $username, $password, $database);
        if ($koneksi){
        } else {
            echo "Server not connected";
        }
        ?>
    </body>
</html>