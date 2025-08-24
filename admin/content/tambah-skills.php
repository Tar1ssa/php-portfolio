<?php
$id = isset($_GET['edit']) ? $_GET['edit'] : '';


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM skills WHERE id = '$id'");
    $rowedit = mysqli_fetch_assoc($query);
    $judul = "Edit skills";
} else {
    $judul = "Tambah skills";
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query(
        $koneksi,
        "DELETE FROM skills WHERE id='$id'");
    if ($delete) {
        header("location:?page=about&hapus=berhasil");
    }
}


// saat tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $skills = $_POST['skill'];
    $prof = $_POST['proficient'];

    if ($id) {
        $update = mysqli_query($koneksi, "UPDATE skills SET skill='$skills', proficient='$prof' WHERE id='$id'");
        if ($update) {
            header("location:?page=about&ubah=berhasil");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO skills (skill, proficient) VALUES('$skills', '$prof')");
        if ($insert) {
            header("location:?page=about&tambah=berhasil");
        }
    }
}




?>

<div class="pagetitle">
    <h1>Tambah Skills</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">skills</li>
            <li class="breadcrumb-item active">Tambah Skills</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Skills</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="">Skills</label>
                            <div id="inputContainer" class="mb-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="skill" placeholder="Skill Name"
                                        value="<?php echo ($id) ? $rowedit['skill'] : '' ?>" required>
                                    <input id="range" class="form-range" type="range" name="proficient" step="5" min="0"
                                        max="100" value="<?php echo ($id) ? $rowedit['proficient'] : '' ?>" required>
                                    <output for="range" id="rangeValue" aria-hidden="true"></output>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            <a href="javascript:history.back()" class="text-muted">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>
    <output for="range" id="rangeValue" aria-hidden="true"></output>

    <script>
        // This is an example script, please modify as needed
        const rangeInput = document.getElementById('range');
        const rangeOutput = document.getElementById('rangeValue');

        // Set initial value
        rangeOutput.textContent = rangeInput.value;

        rangeInput.addEventListener('input', function() {
            rangeOutput.textContent = this.value;
        });
    </script>

</section>