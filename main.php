<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Music Database</title>
</head>
<body>    
    <div class="container">
        <h1>CLASSICAL SM</h1><hr>

        <div class="diagram"><br>
            <a id="diag_link" href="ER Diagram.png" target="_blank">CLICK TO OPEN ER</a><br><br><hr>
        </div>

        <!-- Tables -->
        <div class="tables">
            <a href="music_db.php?query=r1" target="_blank">CD</a>
            <a href="music_db.php?query=r2" target="_blank">Composition</a>
            <a href="music_db.php?query=r3" target="_blank">Tracks</a>
            <a href="music_db.php?query=r4" target="_blank">Orchestra</a>
            <a href="music_db.php?query=r5" target="_blank">CD Orchestra</a>
        </div><hr><br>

        <!-- Forms -->
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
        </form> <br><hr>
        <h3>Search for a track</h3>
        <form action="music_db.php" method="get" target="_blank">
            <input type="text" id="artist" name="artist" placeholder="Artist"><br><br>
            <input type="text" id="composition" name="composition" placeholder="Composition"><br><br>
            <input type="text" id="cd_title" name="cd_title" placeholder="CD Title"><br><br>
            <input type="submit" value="Search">
        </form><br><hr>
        <h3>Add new CD</h3>
        <form action="music_db.php" method="post" target="_blank">
            <input type="text" id="number" name="number" pattern="CD[0-9]+" title="Please enter a CD number in the format CD[0-9]+" placeholder="Number" required><br><br>
            <input type="text" id="id" name="id" placeholder="ID" required><br><br>
            <input type="text" id="title" name="title" placeholder="Title"><br><br>
            <input type="text" id="label" name="label" placeholder="Label"><br><br>
            <input type="text" id="performer" name="performer" placeholder="Performer"><br><br>
            <input type="text" id="time" name="time" placeholder="Time"><br><br>
            <input type="submit" value="Add CD">
        </form> <br><hr>
        <h3>Delete CD</h3>
        <form action="music_db.php" method="post" target="_blank">
            <input type="text" id="delete_cd_nr" name="delete_cd_nr" pattern="CD[0-9]+" title="Please enter a CD number in the format CD[0-9]+" placeholder="CD NR" required><br><br>
            <input type="submit" value="Delete CD">
        </form><br><hr>

        <!-- Queries -->
        <h3>Run SQL Queries</h3>
        <a href="music_db.php?query=q1" target="_blank">List all the <span style="color:crimson;">harpsichord</span> pieces in the library</a><br>
        <a href="music_db.php?query=q2" target="_blank">List all available concertos (composition names that contains the word <span style="color:crimson;">concert</span>)</a><br>
        <a href="music_db.php?query=q3" target="_blank">List all CDs with a recording of <span style="color:crimson;">BWV 780</span>, together with artists names and CD titles</a><br>
        <a href="music_db.php?query=q4" target="_blank">List all the <span style="color:crimson;">Glenn Gould</span> recordings</a><br>
        <a href="music_db.php?query=q5" target="_blank">How many recordings in the library are of the same piece?</a><br>
        <a href="music_db.php?query=q6" target="_blank">Show compositions with Al Fine's favorite key <span style="color:crimson;">(F# minor)</span></a><br><hr><br>
    </div>
</body>
</html>