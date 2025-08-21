<?php
$query = mysqli_query($koneksi, "SELECT * FROM specialization ORDER BY id ASC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<div class="pagetitle">
    <h1>Data specialization</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">specialization</li>
        </ol>
    </nav>
</div><!-- End Page name -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data specialization</h5>
                    <div class="mb-3" align="right">
                        <a href="?page=tambah-specialization" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered align-middle table-hover">
                        <thead class="align-middle table-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>description</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $key => $row):
                            ?>
                                <tr>
                                    <td><?php echo $key += 1 ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="?page=tambah-specialization&edit=<?php echo $row['id'] ?>"
                                            class="btn btn-sm btn-success mx-auto">
                                            Edit
                                        </a>
                                        <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                            href="?page=tambah-specialization&delete=<?php echo $row['id'] ?>"
                                            class="btn btn-sm btn-danger mx-auto mt-2">
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