<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM specialization WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit specialization";
} else {
    $judul = "Add specialization";
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM specialization WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=specialization&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];


    if ($id) {
        $update = mysqli_query($koneksi, "UPDATE specialization SET name='$name', description='$description', status='$status' WHERE id='$id'");
        if ($update) {
            header("location:?page=specialization&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO specialization (name, description, status) VALUES('$name', '$description', '$status')");
        if ($insert) {
            header("location:?page=specialization&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM specialization ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);




?>

<div class="pagetitle">
    <h1><?php echo $judul; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">specialization</li>
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $judul; ?></h5>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="">Name</label>
                            <div class="input-group">
                                <input name="name" type="text" class="form-control"
                                    placeholder="Masukkan specialization" aria-describedby="basic-addon1"
                                    value="<?php echo ($id) ? $rowedit['name'] : '' ?>">>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">description</label>
                            <textarea name="description"
                                class="form-control"><?php echo ($id) ? $rowedit['description'] : '' ?></textarea>

                        </div>

                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" id="">
                                <option <?php echo ($id) ? $rowedit['status'] == 1 ? 'selected' : ''  : '' ?> value="1">
                                    Publish
                                </option>
                                <option <?php echo ($id) ? $rowedit['status'] == 0 ? 'selected' : ''  : '' ?> value="0">
                                    Draft
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="?page=specialization" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>

</section>