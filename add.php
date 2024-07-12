<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
</head>

<body>
<a href="index.php">Go to Home</a>
<br/><br/>

<form action="add_event.php" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Nama Acara</td>
            <td><input type="text" name="event_name"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="date" name="event_date"></td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td><input type="time" name="event_time"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><textarea name="event_description"></textarea></td>
        </tr>
        <tr>
<<<<<<< HEAD
            <td>Organizer</td>
=======
            <td>Organizer ID</td>
>>>>>>> 33831868825ef37e3080756bbe95f9c4d0e819a9
            <td><input type="text" name="organizer_id"></td>
        </tr>
        <tr>
            <td></td>
<<<<<<< HEAD
            <td><input type="submit" name="submit" value="Add"></td>
=======
            <td><input type="submit" name="Submit" value="Add"></td>
>>>>>>> 33831868825ef37e3080756bbe95f9c4d0e819a9
        </tr>
    </table>
</form>

<?php
<<<<<<< HEAD
if (isset($_POST['submit'])) {
=======
if (isset($_POST['Submit'])) {
>>>>>>> 33831868825ef37e3080756bbe95f9c4d0e819a9
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_description = $_POST['event_description'];
    $organizer_id = $_POST['organizer_id'];

<<<<<<< HEAD
    // Include database connection
    include_once("config.php");

    // Insert data into database
    $result = mysqli_query($mysqli, "INSERT INTO acara (event_name, event_date, event_time, event_description, organizer_id) VALUES ('$event_name', '$event_date', '$event_time', '$event_description', '$organizer_id')");

    if ($result) {
        echo "Event added successfully. <a href='index.php'>View Events</a>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
=======
    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO acara(event_name, event_date, event_time, event_description, organizer_id) VALUES('$event_name', '$event_date', '$event_time', '$event_description', '$organizer_id')");

    echo "Event added successfully. <a href='index.php'>View Events</a>";
>>>>>>> 33831868825ef37e3080756bbe95f9c4d0e819a9
}
?>

</body>
</html>
