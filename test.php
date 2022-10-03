<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "GET";
    if (isset($_GET['name'])) {
        echo '<p>Your name is ' . $_GET['name'] . '</p>';
    } else {
        echo '<p>Your name is unset.</p>';
    }

    // radio
    if (isset($_GET['gender'])) {
        echo '<p>You are ' . $_GET['gender'] . '</p>';
    } else {
        echo '<p>Your gender is unset</p>';
    }

    // checkbox
    // If the user did not select any sport, $_POST['sports'] will be unset.
    if (empty($_GET['sports'])) {
        echo 'You did not select any favorite sports.';
    } else { // Return an array containing checked strings.
        echo '<p>Your favorite sports:</br>';
        foreach ($_GET['sports'] as $s) {
            echo '- ' . $s . '</br>';
        }
        echo '</p>';
    }
}
// echo "GET";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="test.php">
        <div>
            <label for="name">Name:</label>
            <input id="name" type="text" name="name">
        </div>
        <div>
            <input type="radio" name="gender" id="female" value="Female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="male" value="Male">
            <label for="male">Male</label>
        </div>
        <div>
            <input type="checkbox" name="sports[]" id="badminton" value="Badminton">
            <label for="badmiton">Badminton</label>
            <input type="checkbox" name="sports[]" id="tennis" value="Tennis">
            <label for="tennis">Tennis</label>
            <input type="checkbox" name="sports[]" id="table-tennis" value="Table Tennis">
            <label for="table-tennis">Table Tennis</label>
            <input type="checkbox" name="sports[]" id="swimming" value="Swimming">
            <label for="swimming">Swimming</label>
            <input type="checkbox" name="sports[]" id="other" value="Other">
            <label for="other">Other</label>
        </div>
        <input type="submit">
    </form>
</body>

</html>