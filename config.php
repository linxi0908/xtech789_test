<?php
$servername = "localhost";
$database = "xtech789_test";
$username = "root";
$password = "your_password";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  userName VARCHAR(50) NOT NULL,
  ref INT(6) UNSIGNED NULL,
  FOREIGN KEY (ref) REFERENCES users(id)
)";


$dataSql = "INSERT INTO users (userName, ref)
        VALUES ('A', NULL)";

  // if ($conn->query($dataSql) === TRUE) {
  //   echo "Data inserted successfully.<br>";
  // } else {
  //   echo "Error inserting data: " . $conn->error . "<br>";
  // }

$dataSql = "INSERT INTO users (userName, ref)
        VALUES ('B', 1),
               ('C', 1),
               ('D', 2),
               ('E', 2),
               ('F', 3),
               ('G', 3),
               ('H', 1),
               ('I', 6),
               ('J', 5),
               ('K', 10),
               ('L', 1)";

// if ($conn->query($dataSql) === TRUE) {
//   echo "Data inserted successfully.<br>";
// } else {
//   echo "Error inserting data: " . $conn->error . "<br>";
// }


// $conn->close(); 


?>