<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Add CD</title>
</head>
<body>    
    <div class="container">
        <form action="music_db.php" method="post" target="_blank">
            <input type="text" id="number" name="number" pattern="CD[0-9]+" title="Please enter a CD number in the format CD[0-9]+" placeholder="Number" required><br><br>
            <input type="text" id="id" name="id" placeholder="ID" required><br><br>
            <input type="text" id="title" name="title" placeholder="Title"><br><br>
            <input type="text" id="label" name="label" placeholder="Label"><br><br>
            <input type="text" id="performer" name="performer" placeholder="Performer"><br><br>
            <input type="text" id="time" name="time" placeholder="Time"><br><br>
            <input type="submit" value="Add CD">
        </form> <br><hr>
    </div>
</body>
</html>