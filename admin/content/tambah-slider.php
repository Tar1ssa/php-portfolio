<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM slider WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit slider";
} else {
    $judul = "Tambah slider";
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $image_query = mysqli_query($koneksi, "SELECT id, image FROM slider Where id='$id'");

    $image_row = mysqli_fetch_assoc($image_query);
    $image_name = $image_row['image'];
    unlink("uploads/slider" . $image_name);
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM slider WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=slider&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];

        $ext_allow = ['image/png', 'image/jpg', 'image/jpeg'];
        if (in_array($type, $ext_allow)) {
            // echo 'image can be uploaded';
            $path = "uploads/slider";
            if (!is_dir($path)) {
                mkdir($path);
            }
            $image_name = time() . "-" . basename($image);
            $target_files = $path . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_files)) {
                //jika gambar ada, maka gambar sebelumnya akan diganti dengan gambar baru
                if (!empty($row['image'])) {
                    unlink($path . $row['image']);
                }
            }
        } else {
            echo 'image extension cant be uploaded';
            die;
        }

        $update_gambar = "UPDATE slider SET title='$title', description='$description', image='$image_name' WHERE id='$id'";
        // mengedit dengan mengubah gambar
    } else {
        $update_gambar = "UPDATE slider SET title='$title', description='$description' WHERE id='$id'";
        // mengedit tanpa mengubah gambar
    }

    if ($id) {
        $update = mysqli_query($koneksi, "$update_gambar");
        if ($update) {
            header("location:?page=slider&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO slider (title, description, image) VALUES('$title', '$description', '$image_name')");
        if ($insert) {
            header("location:?page=slider&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM slider ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);




?>

<div class="pagetitle">
    <h1><?php echo $judul; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">slider</li>
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
                            <label class="form-label" for="">Image</label>
                            <img width="100" src="uploads/slider/<?php echo $rowedit['image']?>" alt="">
                            <input type="file" name="image" id="" class="form-control" placeholder="Masukkan nama anda"
                                value="<?php echo ($id) ? $rowedit['image'] : '' ?>">

                            <small class="text-danger">*image must be landscape, or size 1920 x 1088px</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Title</label>
                            <input type="text" name="title" id="" class="form-control"
                                placeholder="Masukkan judul slider"
                                value="<?php echo ($id) ? $rowedit['title'] : '' ?>">
                            <img src="" alt="">

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Description</label>
                            <textarea name="description" id=""
                                class="form-control"><?php echo ($id) ? $rowedit['description'] : '' ?></textarea>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="?page=slider" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>

</section>