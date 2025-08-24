<?php


$query = mysqli_query($koneksi, "SELECT categories.name, portofolio.* FROM portofolio
 JOIN categories ON categories.name = portofolio.id_category
 ORDER BY portofolio.id DESC");

$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
// var_dump($rows);
// die;



function changeis_active($isactive)
{
    switch ($isactive) {
        case '1':
            $title = "<span class='badge bg-primary'>publish</span>";
            break;

        default:
            $title = "<span class='badge bg-warning'>draft</span>";
            break;
    }
    return $title;
}
?>

<div class="pagetitle">
    <h1>Data portofolio</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">portofolio</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data portofolio</h5>
                    <div class="mb-3" align="right">
                        <a href="?page=tambah-portofolio" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered align-middle table-hover">
                        <thead class="align-middle table-dark">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $key => $row):
                            ?>
                                <tr>
                                    <td><?php echo $key += 1 ?></td>
                                    <td><img width="100" src="uploads/portofolio/<?php echo ($row['image']) ?>" alt="">
                                    </td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo changeis_active($row['is_active']) ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="?page=tambah-portofolio&edit=<?php echo $row['id'] ?>"
                                                class="btn btn-sm btn-success mx-auto">
                                                Edit
                                            </a>
                                            <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                                href="?page=tambah-portofolio&delete=<?php echo $row['id'] ?>"
                                                class="btn btn-sm btn-danger mx-auto">
                                                Delete
                                            </a>
                                        </div>
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