<!DOCTYPE html>
<html>

<body>

    <h1>Interaksi dengan MySQL Database</h1>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_travel";
        
        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Mengecek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }
        
        $sql = "SELECT trip_id, trip_name, description FROM trips";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Outputting data for each row
            while($row = $result->fetch_assoc()) {
                echo "Trip ID: " . $row["trip_id"]. " - Trip Name: " . $row["trip_name"]. " - Description: " . $row["description"]. "<br>";
            }
        } else {
            echo "0 results";
        }        
        
        $conn->close();
    ?>

</body>

</html>