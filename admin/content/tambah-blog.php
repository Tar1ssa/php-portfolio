<?php


$id = isset($_GET['edit']) ? $_GET['edit'] : '';



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM blog WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit blog";
} else {
    $judul = "Add blog";
}

// untuk menghapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $image_query = mysqli_query($koneksi, "SELECT id, image FROM blog Where id='$id'");

    $image_row = mysqli_fetch_assoc($image_query);
    $image_name = $image_row['image'];
    unlink("uploads/blog/" . $image_name);
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM blog WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=blog&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $tagsraw = $_POST['tags'];
    // $tagsunload = json_decode($tagsraw, true);
    // $tagsvalue = array_column($tagsunload, 'value');
    // $tagsstring = implode(',', $tagsvalue);
    $content = $_POST['content'];
    $is_active = $_POST['is_active'];
    $writer = $_SESSION['NAME'];
    $id_category = $_POST['id_category'];
    // mengecek apakah terdapat gambar
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];
        $ext_allow = ['image/png', 'image/jpg', 'image/jpeg'];
        // mengecek apakah ekstensi gambar terdapat didalam variable allowed
        if (in_array($type, $ext_allow)) {
            // echo 'image can be uploaded';
            $path = "uploads/blog/";
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
        $update_gambar = "UPDATE blog SET title='$title', id_category='$id_category', content='$content', writer='$writer', image='$image_name', is_active='$is_active', WHERE id='$id'";
        // dengan gambar
    } else {
        $update_gambar = "UPDATE blog SET title='$title', id_category='$id_category', content='$content', writer='$writer', is_active='$is_active', tags='$tagsraw' WHERE id='$id'";
        //tanpa gambar
    }

    if ($id) {
        $update = mysqli_query($koneksi, "$update_gambar");

        if ($update) {
            header("location:?page=blog&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO blog (title, id_category, content, writer, image, is_active, tags) 
        VALUES('$title', '$id_category', '$content', '$writer', '$image_name', '$is_active', '$tagsraw')");
        if ($insert) {
            header("location:?page=blog&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM blog ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);


$querycategories = mysqli_query($koneksi, "SELECT * FROM categories WHERE type = 'blog' ORDER BY id DESC");
$rowcategories = mysqli_fetch_all($querycategories, MYSQLI_ASSOC);

?>

<div class="pagetitle">
    <h1><?php echo $judul; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">blog</li>
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $judul; ?></h5>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <img width="100" src="uploads/blog/<?php echo ($id) ? $rowedit['image'] : '' ?>" alt="">
                            <input type="file" name="image" id="" class="form-control" placeholder="Masukkan nama anda"
                                value="<?php echo ($id) ? $rowedit['image'] : '' ?>">

                            <small class="text-danger">*image must be landscape, or size 1920 x 1088px</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select name="id_category" id="" class="form-control">
                                <!-- <option value="" disabled selected>Select Category</option> -->
                                <?php
                                foreach ($rowcategories as $keycategories) { ?>
                                    <option value="<?php echo $keycategories['id'] ?>"><?php echo $keycategories['name'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="" class="form-control" placeholder="Masukkan judul blog"
                                value="<?php echo ($id) ? $rowedit['title'] : '' ?>">


                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Content</label>
                            <textarea name="content" id="editor" class="form-control"><?php echo ($id) ? $rowedit['content'] : '' ?>
                            </textarea>
                        </div>
                            
                    
                        <div class="mb-3">
                            <label for="" class="form-label">Tags</label>
                            <input type="text" id="tags" name="tags" />
                        </div>
                        <small>Bila kosong maka tulis 'kosong'</small>

                    </div>
                </div>

            </div>


            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $judul; ?></h5>

                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select name="is_active" id="">
                                <option <?php echo ($id) ? $rowedit['is_active'] == 1 ? 'selected' : ''  : '' ?>
                                    value="1">
                                    Active
                                </option>
                                <option <?php echo ($id) ? $rowedit['is_active'] == 0 ? 'selected' : ''  : '' ?>
                                    value="0">
                                    Inactive
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="?page=blog" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </form>

</section>