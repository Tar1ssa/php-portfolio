<?php
$query = mysqli_query($koneksi, "SELECT * FROM job ORDER BY id ASC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

$querycv = mysqli_query($koneksi, "SELECT * FROM cv LIMIT 1");
$rowcv = mysqli_fetch_assoc($querycv);
// var_dump($rowcv);
// die;

if (isset($_POST['editcv'])) {
    $id = $rowcv['id'];
    if (!empty($_FILES['application']['name'])) {
        $application = $_FILES['application']['name'];
        $tmp_name = $_FILES['application']['tmp_name'];
        $type = $_FILES['application']['type'];
        $ext_allow = ['application/pdf'];
        if (in_array($type, $ext_allow)) {
            // echo 'application can be uploaded';
            $path = "uploads/job/";
            if (!is_dir($path)) {
                mkdir($path);
            }
            $application_name = time() . "-" . basename($application);
            $target_files = $path . $application_name;
            if (move_uploaded_file($_FILES['application']['tmp_name'], $target_files)) {
                //jika gambar ada, maka gambar sebelumnya akan diganti dengan gambar baru
                if (!empty($row['application'])) {
                    unlink($path . $row['application']);
                }
            }
        } else {
            echo 'application extension cant be uploaded';
            die;
        }

        $update_cv = mysqli_query($koneksi, "UPDATE cv SET cv='$application_name' WHERE id='$id'");
        // mengedit dengan mengubah gambar
        if ($update_cv) {
            header("location:?page=job&editcv=berhasil");
        }
    }
}

?>

<div class="pagetitle">
    <h1>Data job</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">job</li>
        </ol>
    </nav>
</div><!-- End Page company -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data job</h5>
                    <div class="mb-3" align="right">
                        <a href="?page=tambah-job" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive-sm">

                        <table class="table table-bordered align-middle table-hover">
                            <thead class="align-middle table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Company Name</th>
                                    <th>Job Title</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody class="">
                                <?php
                                foreach ($rows as $key => $row):
                                ?>
                                    <tr>
                                        <td><?php echo $key += 1 ?></td>
                                        <td><?php echo $row['company'] ?></td>
                                        <td><?php echo $row['job_title'] ?></td>
                                        <td><?php echo $row['description'] ?></td>
                                        <td><?php echo $row['start'] ?> - <?php echo $row['ended'] ?></td>
                                        <td class="">
                                            <div class="d-flex justify-content-between">
                                                <a href="?page=tambah-job&edit=<?php echo $row['id'] ?>"
                                                    class="btn btn-sm btn-success mx-auto">
                                                    Edit
                                                </a>


                                                <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                                    href="?page=tambah-job&delete=<?php echo $row['id'] ?>"
                                                    class="btn btn-sm btn-danger mx-auto my-auto">
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <embed src="uploads/job/<?php echo $rowcv['cv'] ?>" type="application/pdf" width="100%"
                        height="600px" />
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="">CV</label>

                            <input type="file" name="application" id="" class="form-control" accept="application/pdf"
                                value="uploads/job/<?php echo $rowcv['cv'] ?>">

                            <small class="text-danger">*file must be pdf</small>
                        </div>
                        <button class="btn btn-sm btn-success" type="submit" name="editcv">Edit CV</button>
                    </form>
                </div>
            </div>

        </div>


    </div>

</section>