<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'simrs';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$mysqli) {//cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nama_alat = "";
$tahun = "";
$merek = "";
$lokasi = "";
$sukses = "";
$error = "";

if (isset($_GET["op"])) {
    $op = $_GET["op"];
} else {
    $op = "";
}
if($op == 'delete'){
    $id     = $_GET['id'];
    $sql1   = "delete from alat where id = '$id'";
    $q1     = mysqli_query($mysqli,$sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukakn delete data";
    }
}
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from alat where id ='$id'";
    $q1 = mysqli_query($mysqli, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama_alat = $r1['nama_alat'];
    $tahun = $r1['tahun'];
    $merek = $r1['merek'];
    $lokasi = $r1['lokasi'];

    if ($nama_alat == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST["simpan"])) {//untuk create
    $nama_alat = $_POST["nama_alat"];
    $tahun = $_POST["tahun"];
    $merek = $_POST["merek"];
    $lokasi = $_POST["lokasi"];

    if ($nama_alat && $tahun && $merek && $lokasi) {
        if ($op == 'edit') {//untuk update
            $sql1 = "update alat set nama_alat = '$nama_alat',tahun='$tahun',merek='$merek',lokasi='$lokasi' where id = '$id'";
            $q1 = mysqli_query($mysqli, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {// untuk insert
            $sql1 = "insert into alat (nama_alat,tahun,merek,lokasi) values('$nama_alat', '$tahun', '$merek', '$lokasi')";
            $q1 = mysqli_query($mysqli, $sql1);
            if ($q1) {
                $sukses = "Berhasil Memasukkan Data Baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }


    } else {
        $error = "Silahka Masukkan Semua Data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!--untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>

                    <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>

                    <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_alat" class="col-sm-2 col-form-label">Nama Alat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_alat" name="nama_alat"
                                value="<?php echo $nama_alat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tahun" name="tahun"
                                value="<?php echo $tahun ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="merek" class="col-sm-2 col-form-label">Merek</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="merek" name="merek"
                                value="<?php echo $merek ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lokasi" name="lokasi"
                                value="<?php echo $lokasi ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <!--untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Alat
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Alat</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from alat order by id desc";
                        $q2 = mysqli_query($mysqli, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2["id"];
                            $nama_alat = $r2["nama_alat"];
                            $tahun = $r2["tahun"];
                            $merek = $r2["merek"];
                            $lokasi = $r2["lokasi"];

                            ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama_alat ?></td>
                                <td scope="row"><?php echo $tahun ?></td>
                                <td scope="row"><?php echo $merek ?></td>
                                <td scope="row"><?php echo $lokasi ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                            class="btn btn-danger">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm ('Yakin mau delete data?')"><button type="button" class="btn btn-warning">Delete</button></a>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</body>

</html>