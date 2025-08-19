<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM trailers WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit trailers";
} else {
    $judul = "Tambah trailers";
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $image_query = mysqli_query($koneksi, "SELECT id, image FROM trailers Where id='$id'");

    $image_row = mysqli_fetch_assoc($image_query);
    $image_name = $image_row['image'];
    unlink("uploads/trailers" . $image_name);
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM trailers WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=trailers&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $caption = $_POST['caption'];
    $url = $_POST['url'];
    $status = $_POST['status'];
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];

        $ext_allow = ['image/png', 'image/jpg', 'image/jpeg'];
        if (in_array($type, $ext_allow)) {
            // echo 'image can be uploaded';
            $path = "uploads/trailers/";
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

        $update_gambar = "UPDATE trailers SET title='$title', caption='$caption', image='$image_name', url='$url', status='$status' WHERE id='$id'";
        // mengedit dengan mengubah gambar
    } else {
        $update_gambar = "UPDATE trailers SET title='$title', caption='$caption', url='$url', status='$status' WHERE id='$id'";
        // mengedit tanpa mengubah gambar
    }

    if ($id) {
        $update = mysqli_query($koneksi, "$update_gambar");
        if ($update) {
            header("location:?page=trailers&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO trailers (title, caption, image, url, status) VALUES('$title', '$caption', '$image_name', '$url', '$status')");
        if ($insert) {
            header("location:?page=trailers&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM trailers ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);




?>

<div class="pagetitle">
    <h1><?php echo $judul; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">trailers</li>
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
                            <img width="100" src="uploads/trailers<?php echo ($id) ? $rowedit['image'] : '' ?>" alt="">
                            <input type="file" name="image" id="" class="form-control" placeholder="Masukkan nama anda"
                                value="<?php echo ($id) ? $rowedit['image'] : '' ?>">

                            <small class="text-danger">*image must be landscape, or size 1920 x 1088px</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Title</label>
                            <input type="text" name="title" id="" class="form-control"
                                placeholder="Masukkan judul trailers"
                                value="<?php echo ($id) ? $rowedit['title'] : '' ?>">
                            <img src="" alt="">

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">caption</label>
                            <textarea name="caption" id=""
                                class="form-control"><?php echo ($id) ? $rowedit['caption'] : '' ?></textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Video URL</label>
                            <input type="url" name="url" value="<?php echo ($id) ? $rowedit['url'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Status</label>
                            <select name="status" id="">
                                <option <?php echo ($id) ? $rowedit['status'] == 1 ? 'selected' : ''  : '' ?> value="1">
                                    Active
                                </option>
                                <option <?php echo ($id) ? $rowedit['status'] == 0 ? 'selected' : ''  : '' ?> value="0">
                                    Inactive
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="?page=trailers" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>

</section>