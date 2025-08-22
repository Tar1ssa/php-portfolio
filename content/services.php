<section id="services"
  class="navbar-is-white section pp-scrollable d-flex align-items-center position-absolute bg-dark">
  <div class="intro">
    <div class="container">
      <h2 class="text-white"><span class="text-primary">My</span> Specialization.</h2>
      <div class="mt-5 pt-5">
        <div class="row">
          <?php
          $lastitem = end($rowspec);
          foreach ($rowspec as $keyspec) { ?>
            <div class="col-md-4 mb-4 <?php if ($keyspec === $lastitem) {
                                        echo "";
                                      } else {
                                        echo "mb-md-0";
                                      } ?>">
              <h6 class="text-white"><?php echo $keyspec['name'] ?></h6>
              <p><?php echo $keyspec['description'] ?></p>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
</section>