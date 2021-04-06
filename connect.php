       <?php
       $conn = new mysqli("localhost","root","","datatin24h");
       if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>