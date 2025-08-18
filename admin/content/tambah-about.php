<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM about WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit about";
} else {
    $judul = "Add about";
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $image_query = mysqli_query($koneksi, "SELECT id, image FROM about Where id='$id'");

    $image_row = mysqli_fetch_assoc($image_query);
    $image_name = $image_row['image'];
    unlink("uploads/about/" . $image_name);
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM about WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=about&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $time = $_POST['time'];
    $how_long = $_POST['how_long'];
    $status = $_POST['status'];
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];

        $ext_allow = ['image/png', 'image/jpg', 'image/jpeg'];
        if (in_array($type, $ext_allow)) {
            // echo 'image can be uploaded';
            $path = "uploads/about/";
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

        $update_gambar = "UPDATE about SET title='$title', content='$content', image='$image_name', status='$status' WHERE id='$id'";
        // edit dengan mengubah gambar
    } else {
        $update_gambar = "UPDATE about SET title='$title', content='$content', status='$status' WHERE id='$id'";
        // edit tanpa mengubah gambar
    }


    if ($id) {
        $update = mysqli_query($koneksi, "$update_gambar");
        if ($update) {
            header("location:?page=about&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO about (title, content, image, status) VALUES('$title', '$content', '$image_name', '$status')");
        if ($insert) {
            header("location:?page=about&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);




?>

<div class="pagetitle">
    <h1><?php echo $judul; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">About</li>
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
                            <label for="">Title</label>
                            <input type="text" name="title" id="" class="form-control"
                                placeholder="Masukkan judul about" value="<?php echo ($id) ? $rowedit['title'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea name="content" 
                                class="form-control"><?php echo ($id) ? $rowedit['content'] : '' ?></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="">Experience</label>
                            <input type="text" name="how_long" id="" class="form-control"
                                placeholder="ex:7" value="<?php echo ($id) ? $rowedit['how_long'] : '' ?>">
                                <small>Input how long is your experience</small>
                            <input type="text" name="time" id="" class="form-control"
                                placeholder="ex:Years/Month/Days" value="<?php echo ($id) ? $rowedit['time'] : '' ?>">
                                <small>Input the time</small>
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
                            <a href="?page=about" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>

</section>