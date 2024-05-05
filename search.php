<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Search Form</title>
</head>

<script>
    function validate_form() {
        var artist = document.getElementById('artist').value;
        var composition = document.getElementById('composition').value;
        var cd_title = document.getElementById('cd_title').value;

        if (artist == "" && composition == "" && cd_title == "") {
            alert("Please fill at least one field before searching.");
            return false;
        }
    }
</script>


<body>    
    <div class="container"><br>
        <form action="music_db.php" method="get" target="_blank">
            <input type="text" id="cd_nr" name="cd_nr" pattern="CD[0-9]+" title="Please enter a CD number in the format CD[0-9]+" placeholder="CD NR" required><br><br>
            <input type="submit" value="Search">
        </form><br><hr><br>
        <form action="music_db.php" method="get" target="_blank">
            <input type="text" id="bwv" name="bwv" pattern="BWV [0-9]+" title="Please enter a BWV number in the format BWV [0-9]+" placeholder="BWV Number" required><br><br>
            <input type="submit" value="Search">
        </form><br><hr><br>
        <form action="music_db.php" method="get" target="_blank">
            <input type="text" id="instrument" name="instrument" placeholder="Instrument" required><br><br>
            <input type="submit" value="Search">
        </form> <br><hr><br>
        <form action="music_db.php" method="get" target="_blank" onsubmit="return validate_form()">
            <input type="text" id="artist" name="artist" placeholder="Artist"><br><br>
            <input type="text" id="composition" name="composition" placeholder="Composition"><br><br>
            <input type="text" id="cd_title" name="cd_title" placeholder="CD Title"><br><br>
            <input type="submit" value="Search">
        </form><br><hr>
    </div>
</body>
</html>