<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Remove CD</title>
</head>
<body>    
    <div class="container">
        <form action="music_db.php" method="post" target="_blank">
            <input type="text" id="delete_cd_nr" name="delete_cd_nr" pattern="CD[0-9]+" title="Please enter a CD number in the format CD[0-9]+" placeholder="CD NR" required><br><br>
            <input type="submit" value="Delete CD" disabled>
        </form><br><hr>
    </div>
</body>
</html>