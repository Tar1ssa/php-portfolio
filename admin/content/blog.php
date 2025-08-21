<?php
// $query = mysqli_query($koneksi, "SELECT categories.name, blog.* FROM blog JOIN categories ON categories.id = blog.id_category ORDER BY blog.id DESC");

$query = mysqli_query($koneksi, "SELECT categories.name, blog.* FROM blog
 JOIN categories ON categories.id = blog.id_category
 ORDER BY blog.id DESC");

$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);



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
    <h1>Data blog</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">blog</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data blog</h5>
                    <div class="mb-3" align="right">
                        <a href="?page=tambah-blog" class="btn btn-primary">Tambah</a>
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
                                    <td><img width="100" src="uploads/blog/<?php echo ($row['image']) ?>" alt="">
                                    </td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo changeis_active($row['is_active']) ?></td>
                                    <td><?php echo $row['id_category'] ?></td>
                                    <td>
                                        <a href="?page=tambah-blog&edit=<?php echo $row['id'] ?>"
                                            class="btn btn-sm btn-success mx-auto">
                                            Edit
                                        </a>
                                        <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                            href="?page=tambah-blog&delete=<?php echo $row['id'] ?>"
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