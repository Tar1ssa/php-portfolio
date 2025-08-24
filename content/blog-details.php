<!-- Page Title -->
<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';
$queryblogdetails = mysqli_query($koneksi, "SELECT categories.name AS category_name, blog.* FROM blog
 JOIN categories ON categories.id = blog.id_category WHERE blog.id='$id'");
$rowblogdetails = mysqli_fetch_assoc($queryblogdetails);

$querytag = mysqli_query($koneksi, "SELECT tags FROM blog WHERE id='$id'");
$rowtag = mysqli_fetch_all($querytag, MYSQLI_ASSOC);

$queryblogrecent = mysqli_query($koneksi, "SELECT categories.name AS category_name, blog.* FROM blog
 JOIN categories ON categories.id = blog.id_category ORDER BY blog.id DESC LIMIT 5");
$rowblogrecent = mysqli_fetch_all($queryblogrecent, MYSQLI_ASSOC);

?>


<section id="home" class=" section pp-scrollable d-flex position-absolute align-items-center bg-light d-block">
    <div class="intro">
        <div class="container mt-4">
            <div class="row">
                <div class="container py-5">
                    <div class="card shadow-sm border-0 mx-3">

                        <img src="admin/uploads/blog/<?php echo $rowblogdetails['image'] ?>" class="card-img-top" alt="Blog Image">

                        <div class="card-body card-body px-4 py-4">
                                <!-- Title -->
                                <h2 class="card-title mb-3"><?php echo $rowblogdetails['title'] ?>
                                </h2>

                                    <!-- Meta Info -->
                                    <div class="text-muted mb-4">
                                        <small>Posted by <strong><?php echo $rowblogdetails['writer']; ?></strong> on <?php echo date("M d", strtotime($rowblogdetails['created_at'])) . "," .
                                                                        date("Y", strtotime($rowblogdetails['created_at'])) ?></small>
                                    </div>

                                        <!-- Blog Content -->
                                    <p class="card-text">
                                        <?php echo $rowblogdetails['content'] ?>
                                    </p>
                                    <?php
                                    $tag = json_decode($rowblogdetails['tags'], true);
                                    ?>

                                    <div class=" d-flex flex-column flex-md-row mt-3" style="gap: 10px;">

                                        <!-- Category Section -->
                                        <div class=" d-flex align-items-center" style="gap: 10px; width:fit-content;">
                                            <i class="bi bi-folder fs-5 text-secondary"></i>
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">
                                            <?php echo $rowblogdetails['category_name'] ?>
                                            </a>
                                        </div>

                                        <!-- Tags Section -->
                                        <div class="d-flex align-items-center gap-2 flex-wrap ms-3">
                                            <i class="bi bi-tags fs-5 text-secondary"></i>
                                            <div class="d-flex flex-wrap" style="gap: 10px;">
                                            <?php 
                                            if ($tag == null) {
                                               echo "no tags";
                                            } else {
                                                
                                            foreach ($tag as $valuetags) { ?>
                                                <a href="#" class="badge bg-light text-dark px-3 py-2 text-decoration-none">
                                                <?php echo $valuetags['value'] ?>
                                                </a>
                                            
                                            <?php }
                                                } ?>
                                            </div>
                                        </div>

                                    </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>