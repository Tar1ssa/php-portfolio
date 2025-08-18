<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $title = "Edit User";
} else {
    $title = "Tambah User";
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    if ($delete) {
        header("location:?page=user&hapus=berhasil");
    }
}

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = ($_POST['password']) ? $_POST['password'] : $rowedit['password'];

    if ($id) {
        $update = mysqli_query($koneksi, "UPDATE user SET name='$name', email='$email', password='$password' WHERE id='$id'");
        if ($update) {
            header("location:?page=user&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO user (name, email, password) VALUES('$name', '$email', '$password')");
        if ($insert) {
            header("location:?page=user&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);




?>

<div class="pagetitle">
    <h1><?php echo $title; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $title; ?></h5>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="Masukkan nama anda"
                                required value="<?php echo ($id) ? $rowedit['name'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control"
                                placeholder="Masukkan email anda" required
                                value="<?php echo ($id) ? $rowedit['email'] : '' ?>">

                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control"
                                placeholder="Masukkan password anda" <?php echo (!$id) ? 'required' : '' ?>>
                            <small>* isi password jika ingin mengubah password</small>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="?page=user" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>

</section>