<?php

include 'methods.php';

echo "<style>
        td, th {
          padding: 1px 30px;
        }
        th {
          padding-bottom: 10px;
        }
        table {
          font-family: 'Roboto', monospace;
          font-size: 15px;
        }
</style>";

$servername = "localhost:3306";
$username = "root";
$password = "mysqlserver2024";
$dbname = "db3";

$conn = connect_to_db($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['delete_cd_nr'])) {
    handle_delete_request($conn);
  } else {
    handle_insert_request($conn);
  }
} 
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $sql = handle_get_request($conn);
  $result = $conn->query($sql);
  display_result($result);
}

$conn->close();

?>