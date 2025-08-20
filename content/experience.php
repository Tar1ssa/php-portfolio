<section id="experience" class="section pp-scrollable d-flex align-items-center position-absolute">
  <div class="intro">
    <div class="container">
      <h2><span class="text-primary">Education</span> & Experience.</h2>
      <div class="mt-5 pt-5">
        <?php foreach ($rowjob as $keyjob) { ?>
          <div class="row-experience row justify-content-between">
            <div class="col-md-4">
              <div class="h6 my-0 text-gray"><?php echo $keyjob['start'] ?>-<?php echo $keyjob['ended'] ?>
              </div>
              <h5 class="mt-2 text-primary text-uppercase"><?php echo $keyjob['company'] ?></h5>
            </div>
            <div class="col-md-4">
              <h5 class="mb-3 mt-0 text-uppercase"><?php echo $keyjob['job_title'] ?></h5>
            </div>
            <div class="col-md-4">
              <p><?php echo $keyjob['description'] ?></p>
            </div>
          </div>
        <?php } ?>

        <a href="admin/uploads/job/<?php echo $rowcv['cv'] ?>" class="btn mt-3" download="">Download cv</a>
      </div>
    </div>
  </div>
</section>