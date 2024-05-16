<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama_alat= $_POST['nama_alat'];
    $tahun = $_POST['tahun'];
    $merek= $_POST['merek'];
    $lokasi = $_POST['lokasi'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE alat SET nama_alat='$nama_alat',tahun='$tahun',merek='$merek',lokasi='$lokasi' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM alat WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama_alat = $user_data['nama_alat'];
    $tahun = $user_data['tahun'];
    $merek= $user_data['merek'];
    $lokasi = $user_data['lokasi'];
}
?>
<html>
<head>
    <title>Edit User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<a href="index.php">Home</a>
<br/><br/>

<form name="update_user" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Nama Alat</td>
            <td><input type="text" name="nama_alat" value=<?php echo $nama_alat;?>></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td><input type="text" name="tahun" value=<?php echo $tahun;?>></td>
        </tr>
        <tr>
            <td>Merek</td>
            <td><input type="text" name="merek" value=<?php echo $merek;?>></td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td><input type="text" name="lokasi" value=<?php echo $lokasi;?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
            
        </tr>
    </table>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>