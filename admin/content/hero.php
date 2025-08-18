<?php
// jika data hero sudah ada maka update data tersebut
// selain itu kalau belum ada maka insert data
$queryhero = mysqli_query($koneksi, "SELECT * FROM hero LIMIT 1");
$row = mysqli_fetch_assoc($queryhero);

if (isset($_POST['simpan'])) {
    $caption = $_POST['caption'];




    // jika gambar terupload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $path = "uploads/hero/";
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
       
       
    }

    if ($row) {
        //update

        $id_hero = $row['id'];
        // var_dump($update_gambar);
        // die;
        $update = mysqli_query($koneksi, "UPDATE hero SET caption='$caption', image = '$image_name' WHERE id = '$id_hero'");
        if ($update) {
            header("location:?page=hero&ubah=berhasil");
        }
    } else {
        //insert
        $insert = mysqli_query($koneksi, "INSERT INTO hero (caption, image)
            VALUES ('$caption', '$image_name')");
        if ($insert) {
            header("location:?page=hero&tambah=berhasil");
        }
    }
}



?>


<div class="pagetitle">
    <h1>hero</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">hero</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">hero</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-2 row">
                            <label for="" class="form-label fw-bold">Caption</label>
                        </div>
                        <div class="col-sm-6 mb-2">
                           
                                <textarea  class="form-control" name="caption" id=""><?php echo isset($row['caption']) ? $row['caption'] : '' ?></textarea>
                        </div>
                        
                        <div class="mb-2 row">
                            <label for="" class="form-label fw-bold">Hero image</label>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <input type="file" name="image" id="">
                            <img class="mt-2" width="100"
                                src="uploads/<?php echo isset($row['image']) ? $row['image'] : '' ?>" alt="">
                        </div>
                        
                        <div class="mb-2 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

</section>