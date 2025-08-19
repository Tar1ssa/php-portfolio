<?php
$query = mysqli_query($koneksi, "SELECT * FROM job ORDER BY id ASC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>CV</th>
                                <th>Company Name</th>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $key => $row):
                            ?>
                                <tr>
                                    <td><?php echo $key += 1 ?></td>
                                    <td><img width="100" src="uploads/job<?php echo ($row['cv']) ?>" alt="">
                                    </td>
                                    <td><?php echo $row['company'] ?></td>
                                    <td><?php echo $row['job_title'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td>
                                        <a href="?page=tambah-job&edit=<?php echo $row['id'] ?>"
                                            class="btn btn-sm btn-success">
                                            Edit
                                        </a>
                                        <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                            href="?page=tambah-job&delete=<?php echo $row['id'] ?>"
                                            class="btn btn-sm btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>

</section>