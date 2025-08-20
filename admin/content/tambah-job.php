<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';



if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM job WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit job";
} else {
    $judul = "Tambah job";
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $application_query = mysqli_query($koneksi, "SELECT id, cv FROM job Where id='$id'");

    $application_row = mysqli_fetch_assoc($application_query);
    $application_name = $application_row['cv'];
    unlink("uploads/job" . $application_name);
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM job WHERE id='$id'"
    );
    if ($delete) {
        header("location:?page=job&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $company = $_POST['company'];
    $description = $_POST['description'];
    $job = $_POST['job'];
    $start = $_POST['start'];
    $ended = $_POST['ended'];

    if ($id) {
        $update = mysqli_query($koneksi, "UPDATE job SET company='$company', description='$description', job_title='$job', start='$start', ended='$ended' WHERE id='$id'");
        if ($update) {
            header("location:?page=job&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO job (company, description, job_title, start, ended) VALUES('$company', '$description', '$job', '$start', '$ended')");
        if ($insert) {
            header("location:?page=job&tambah=berhasil");
        }
    }
}
// $query = mysqli_query($koneksi, "SELECT * FROM job ORDER BY id DESC");
// $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);




?>

<div class="pagecompany">
    <h1><?php echo $judul; ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">job</li>
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </nav>
</div><!-- End Page company -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $judul; ?></h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="">Company</label>
                            <input type="text" name="company" id="" class="form-control"
                                placeholder="Masukkan judul job" value="<?php echo ($id) ? $rowedit['company'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Job Title</label>
                            <input type="text" name="job" id="" class="form-control" placeholder="Masukkan judul job"
                                value="<?php echo ($id) ? $rowedit['job_title'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Description</label>
                            <textarea name="description" id=""
                                class="form-control"><?php echo ($id) ? $rowedit['description'] : '' ?></textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Duration</label>
                            <br>
                            <small class="text-muted">Tahun mulai</small>
                            <input type="number" name="start" id="" class="form-control"
                                placeholder="Masukkan tahun mulai" value="<?php echo $rowedit['start']  ?>" min="1900"
                                max="2100" step="1">
                            <br>
                            <small class="text-muted">Tahun selesai</small>
                            <input type="number" name="ended" id="" class="form-control"
                                placeholder="Masukkan tahun selesai" value="<?php echo $rowedit['ended'] ?>" min="1900"
                                max="2100" step="1">



                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="?page=job" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>

</section>