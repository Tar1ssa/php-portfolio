<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';


$queryexp = mysqli_query($koneksi, "SELECT * FROM experience WHERE id = $id");
$rowexp = mysqli_fetch_assoc($queryexp);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $queryeditexp = mysqli_query($koneksi, "SELECT * FROM experience WHERE id = '$id'");
    $roweditexp = mysqli_fetch_assoc($queryeditexp);
} else {
    
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM about WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=tambah-about&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $time = $_POST['time'];
    $how_long = $_POST['how_long'];
    


    if ($id) {
        
        $update = mysqli_query($koneksi, "UPDATE experience SET how_long='$how_long', time='$time'");
        if ($update) {
            header("location:?page=tambah-about&ubah=berhasil");
        }
    } else {
        
        $insert = mysqli_query($koneksi, "INSERT INTO experience (how_long, time) VALUES ('$how_long', '$time')");
        if ($insert) {
            header("location:?page=tambah-about&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

$id = isset($_GET['edit']) ? $_GET['edit'] : '';


?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Experience</h5>
                    <form action="" method="post" enctype="multipart/form-data">
        
                        <div class="mb-3">
                        
                            <label for="">Experience</label>
                            <input type="text" name="how_long" id="" class="form-control" placeholder="ex:7"
                                value="<?php echo ($id) ? $rowexp['how_long'] : '' ?>">
                            <small>Input how long is your experience</small>
                            <input type="text" name="time" id="" class="form-control" placeholder="ex:Years/Month/Days"
                                value="<?php echo ($id) ? $rowexp['time'] : '' ?>">
                            <small>Input the time</small>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Update Experience</button>
                            <a href="javascript:history.back()" class="text-muted">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>