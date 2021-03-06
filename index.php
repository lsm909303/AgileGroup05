<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

// Create connection
$conn = new mysqli($server, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT PersonID, LastName, FirstName FROM Persons";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["PersonID"]. " - Name: " . $row["LastName"]. " " . $row["FirstName"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

echo "Hello";

?>
