<?php
$query = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id ASC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

$queryexp = mysqli_query($koneksi, "SELECT * FROM experience ORDER BY id DESC LIMIT 1");
$rowexp = mysqli_fetch_all($queryexp, MYSQLI_ASSOC);

$queryskills = mysqli_query($koneksi, "SELECT * FROM skills ORDER BY id DESC");
$rowskills = mysqli_fetch_all($queryskills, MYSQLI_ASSOC);

$totalskills =  mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM skills");
$rowtotalskills = mysqli_fetch_assoc($totalskills);
?>

<div class="pagetitle">
    <h1>Data About</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">About</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data about</h5>
                    <div class="mb-3" align="right">
                        <a href="?page=tambah-about" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered align-middle table-hover">
                        <thead class="align-middle table-dark">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
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
                                    <td><img width="100" src="uploads/about/<?php echo ($row['image']) ?>" alt="">
                                    </td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['content'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="?page=tambah-about&edit=<?php echo $row['id'] ?>"
                                                class="btn btn-sm btn-success mx-auto">
                                                Edit
                                            </a>
                                            <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                                href="?page=tambah-about&delete=<?php echo $row['id'] ?>"
                                                class="btn btn-sm btn-danger mx-auto my-auto">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                        <?php
                            include 'experience.php';
                        ?>
                        <hr>
                        <label for="">Skills</label>
                        <?php
                            if ($rowtotalskills['total'] == 4) {
                                echo " is full";
                            } else {
                                echo "<a href='?page=tambah-skills' class='btn btn-sm btn-primary' align='right'>Tambah Skills</a>";
                            }
                        ?>
                        
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Skill</th>
                                    <th>Proficiency</th>
                                    <th>



                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rowskills as $keyskills => $rowskill):
                                ?>
                                    <tr>
                                        <td><?php echo $keyskills += 1 ?></td>
                                        <td><?php echo $rowskill['skill'] ?></td>
                                        <td><input class="form-range" type="range" min="0" max="100"
                                                value="<?php echo $rowskill['proficient'] ?>" readonly
                                                disabled><?php echo $rowskill['proficient'] ?>%</td>
                                        <td>
                                            <a href="?page=tambah-skills&edit=<?php echo $rowskill['id'] ?>"
                                                class="btn btn-sm btn-success">
                                                Edit
                                            </a>
                                            <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')"
                                                href="?page=tambah-skills&delete=<?php echo $rowskill['id'] ?>"
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