<?php


$id = isset($_GET['edit']) ? $_GET['edit'] : '';


// untuk mengedit data
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM portofolio WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit portofolio";
} else {
    $judul = "Add portofolio";
}

// untuk menghapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $image_query = mysqli_query($koneksi, "SELECT id, image FROM portofolio Where id='$id'");

    $image_row = mysqli_fetch_assoc($image_query);
    $image_name = $image_row['image'];
    unlink("uploads/portofolio/" . $image_name);
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM portofolio WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=portofolio&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $is_active = $_POST['is_active'];
    $id_category = $_POST['id_category'];
    $client_name = $_POST['client_name'];
    $project_date = $_POST['project_date'];
    $project_url = $_POST['project_url'];

    if (!empty($_FILES['image']['name'])) { // mengecek apakah terdapat gambar

        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];
        $ext_allow = ['image/png', 'image/jpg', 'image/jpeg'];
        // mengecek apakah ekstensi gambar terdapat didalam variable allowed

        if (in_array($type, $ext_allow)) {
            // echo 'image can be uploaded';
            $path = "uploads/portofolio/";
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

        $update_gambar = "UPDATE portofolio SET title='$title', id_category='$id_category', content='$content' , image='$image_name', is_active='$is_active'
        , client_name='$client_name', project_date='$project_date', project_url='$project_url' WHERE id='$id'";
        // mengedit dengan mengubah gambar
    } else {
        $update_gambar = "UPDATE portofolio SET title='$title', id_category='$id_category', content='$content', is_active='$is_active'
        , client_name='$client_name', project_date='$project_date', project_url='$project_url' WHERE id='$id'";
        // mengedit tanpa mengubah gambar
    }

    if ($id) {

        $update = mysqli_query($koneksi, "$update_gambar");

        if ($update) {
            header("location:?page=portofolio&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO portofolio (title, id_category, content, image, is_active, client_name, project_date, project_url) 
        VALUES('$title', '$id_category', '$content', '$image_name', '$is_active', '$client_name', '$project_date', '$project_url')");
        if ($insert) {
            header("location:?page=portofolio&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM portofolio ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);


$querycategories = mysqli_query($koneksi, "SELECT * FROM categories WHERE type = 'portofolio' ORDER BY id DESC");
$rowcategories = mysqli_fetch_all($querycategories, MYSQLI_ASSOC);

?>

<div class="pagetitle">
    <h1><?php echo $judul; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">portofolio</li>
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
                            <img width="100" src="uploads/portofolio/<?php echo ($id) ? $rowedit['image'] : '' ?>"
                                alt="">
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
                            <input type="text" name="title" id="" class="form-control"
                                placeholder="Masukkan judul portofolio"
                                value="<?php echo ($id) ? $rowedit['title'] : '' ?>">

                            <div class="mb-3">
                                <label for="" class="form-label">Client Name</label>
                                <input type="text" id="" name="client_name" class="form-control"
                                    value="<?php echo ($id) ? $rowedit['client_name'] : '' ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Project Date</label>
                                <input type="date" id="" name="project_date" class="form-control"
                                    value="<?php echo ($id) ? $rowedit['project_date'] : '' ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Project URL</label>
                                <input type="url" id="" name="project_url" class="form-control"
                                    value="<?php echo ($id) ? $rowedit['project_url'] : '' ?>" />
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Content</label>
                            <textarea name="content" id="editor" class="form-control"><?php echo ($id) ? $rowedit['content'] : '' ?>
                            </textarea>
                        </div>



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
                            <a href="?page=portofolio" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </form>

</section>