<?php
$query = mysqli_query($koneksi, "SELECT * FROM client ORDER BY id ASC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<div class="pagetitle">
    <h1>Data client</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">client</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data client</h5>
                    <div class="mb-3" align="right">
                        <a href="?page=tambah-client" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered align-middle table-hover">
                        <thead class="align-middle table-dark">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
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
                                    <td><img width="100" src="uploads/client/<?php echo ($row['image']) ?>" alt="">
                                    </td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="?page=tambah-client&edit=<?php echo $row['id'] ?>"
                                            class="btn btn-sm btn-success mx-auto">
                                            Edit
                                        </a>
                                        <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                            href="?page=tambah-client&delete=<?php echo $row['id'] ?>"
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