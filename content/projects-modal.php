
<?php foreach ($rowportofolio as $keymodalport) { ?>
  

<div id="project<?php echo $keymodalport['id'] ?>" class="container mfp-hide zoom-anim-dialog">
    <h2 class="mt-0"><?php echo $keymodalport['title'] ?></h2>
    <div class="mt-5 pt-2 text-dark">
      <div class="row">
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Clients:</h6>
          <span><?php echo $keymodalport['client_name'] ?></span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Completion:</h6>
          <span><?php echo $keymodalport['project_date'] ?></span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Project Type:</h6>
          <span><?php echo $keymodalport['id_category'] ?></span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0"><?php echo $keymodalport['id_label'] ?></h6>
          <span><?php echo $keymodalport['label_data'] ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <h6 class="my-0">Budget:</h6>
          <span>Rp<?php echo $keymodalport['price']?>,-</span>
        </div>
      </div>
    </div>
    <img alt="" class="mt-5 pt-2 w-100" src="admin/uploads/portofolio/<?php echo $keymodalport['image'] ?>">
  </div>
<?php } ?>