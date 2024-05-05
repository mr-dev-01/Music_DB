<?php

function connect_to_db($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
  
function handle_insert_request($conn) {
    $number = strtoupper($_POST['number']);
    $id = $_POST['id'];
    $title = $_POST['title'];
    $label = $_POST['label'];
    $performer = $_POST['performer'];
    $time = $_POST['time'];

    $sql = "INSERT INTO cd (number, id, title, label, performer, time) 
            VALUES ('$number', '$id', '$title', '$label', '$performer', '$time')";

    try {
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        exit();
    }
    } catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        echo "Error: CD with this number or ID already exists";
        exit();
    } else {
        echo "An error occurred while adding the CD. Please try again.";
        exit();
    }
    }
}

function handle_delete_request($conn) {
    $delete_cd_nr = strtoupper($_POST['delete_cd_nr']);
    $sql = "DELETE FROM cd WHERE number = '$delete_cd_nr'";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "Record deleted successfully";
        } else {
            echo "No CD record found with that number";
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
  
function generate_sql_query($artist, $composition, $cd_title, $bwv, $instrument, $cd_nr, $query) {
    if (!empty($artist) || !empty($composition) || !empty($cd_title)) {
        $sql = "SELECT cd.title AS 'CD title', 
                cd.performer AS Artist, composition.name AS Composition
                FROM cd 
                LEFT JOIN tracks ON cd.number = tracks.cd_nr
                LEFT JOIN composition ON tracks.comp_id = composition.id
                AND composition.name LIKE '%$composition%'
                WHERE cd.performer LIKE '%$artist%'
                AND cd.title LIKE '%$cd_title%'";
    } else if (isset($_GET['bwv'])) {
        $sql = "SELECT * FROM composition WHERE composition.BWV_num LIKE '%$bwv%'";
    } else if (isset($_GET['instrument'])) {
        $sql = "SELECT cd.title AS 'CD title', cd.performer AS Artist, composition.name AS Composition, tracks.instrument AS Instrument
                FROM cd
                INNER JOIN tracks ON cd.number = tracks.cd_nr
                INNER JOIN composition ON tracks.comp_id = composition.id
                WHERE tracks.instrument LIKE '%$instrument%'";
    } else if (isset($_GET['cd_nr'])) {
        $sql = "SELECT * FROM cd WHERE cd.number = '$cd_nr'";
    } 
    
    else if (isset($_GET['query'])) {
        switch ($query) {
        case 'q1':
            $sql = "SELECT composition.name AS Composition, tracks.instrument as Instrument
            FROM composition
            INNER JOIN tracks ON composition.id = tracks.comp_id
            WHERE tracks.instrument = 'Harpsichord'";
            break;
        case 'q2':
            $sql = "SELECT composition.name AS Composition
            FROM composition
            WHERE composition.name LIKE '%Concerto%'";
            break;
        case 'q3':
            $sql = "SELECT cd.title AS 'CD title', cd.performer AS Artist, composition.BWV_num
            FROM cd
            INNER JOIN tracks ON cd.number = tracks.cd_nr
            INNER JOIN composition ON tracks.comp_id = composition.id
            WHERE composition.BWV_num = 'BWV 780'";
            break;
        case 'q4':
            $sql = "SELECT DISTINCT cd.title AS 'CD title', cd.performer AS Artist, composition.name AS Composition
            FROM cd
            INNER JOIN tracks ON cd.number = tracks.cd_nr
            INNER JOIN composition ON tracks.comp_id = composition.id
            WHERE cd.performer = 'Glenn Gould'";
            break;
        case 'q5':
            $sql = "SELECT tracks.comp_id AS 'Comp ID', composition.name AS 'Composition', COUNT(tracks.comp_id) as Copies
            FROM tracks
            LEFT JOIN composition ON tracks.comp_id = composition.id
            GROUP BY comp_id
            HAVING Copies > 1";
            break;
        case 'q6':
            $sql = "SELECT composition.id AS 'Comp id', composition.name AS Composition
            FROM composition
            WHERE composition.name LIKE '%F# Minor%'";
            break;
        case 'r1':
            $sql = "SELECT * FROM cd";
            break;
        case 'r2':
            $sql = "SELECT * FROM composition";
            break;
        case 'r3':
            $sql = "SELECT * FROM tracks";
            break;
        case 'r4':
            $sql = "SELECT * FROM orchestra";
            break;
        case 'r5':
            $sql = "SELECT * FROM cd_orchestra";
            break;
        default:
            echo "Invalid query";
            exit();
        }
    }
    else {
        echo "Query parameter is missing";
        exit();
    }

    return $sql;
}
  
function handle_get_request() {
    $artist = isset($_GET['artist']) ? $_GET['artist'] : '';
    $composition = isset($_GET['composition']) ? $_GET['composition'] : '';
    $cd_title = isset($_GET['cd_title']) ? $_GET['cd_title'] : '';
    $bwv = isset($_GET['bwv']) ? $_GET['bwv'] : '';
    $instrument = isset($_GET['instrument']) ? $_GET['instrument'] : '';
    $query = isset($_GET['query']) ? $_GET['query'] : '';
    $cd_nr = isset($_GET['cd_nr']) ? $_GET['cd_nr'] : '';

    $sql = generate_sql_query($artist, $composition, $cd_title, $bwv, $instrument, $cd_nr, $query);
    return $sql;
}
  
function display_result($result) {
    if ($result->num_rows > 0) {
        $fieldinfo = $result->fetch_fields();
        echo "<table style='text-align: left;'><tr>";
        echo "<th>Row</th>";

        foreach ($fieldinfo as $val) {
        echo "<th>" . ucfirst($val->name) . "</th>";
        }

        echo "</tr>";
    
    $rowNumber = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rowNumber . "</td>";
        foreach ($fieldinfo as $val) {
        echo "<td>" . $row[$val->name] . "</td>";
        }
        echo "</tr>";
        $rowNumber++;
    }
        echo "</table>";
    } else {
        echo "No results found!";
    }
}
  
?>