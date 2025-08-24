
<section id="home" class="pp-section section pp-scrollable d-flex align-items-center position-absolute bg-light">
        <div class="intro">
          <div class="container">
            <h2><span class="text-primary">Latest</span> Projects.</h2>
            <div class="mt-5 pt-4">
            <div class="carousel-project owl-carousel">
              <?php foreach ($rowportofolio as $keyportofolio) { ?>
              
             <div class="project-item">
                <a href="#project<?php echo $keyportofolio['id'] ?>" class="popup-with-zoom-anim">
                  <figure class="position-relative">
                    <div style=" min-height: 70vh; max-height: 90vh;">
                      <img alt=""  class="img-fluid" src="admin/uploads/portofolio/<?php echo $keyportofolio['image'] ?>">

                    </div>
                    <figcaption class="text-white">
                      <h3 class="mb-2 text-white"><?php echo $keyportofolio['title'] ?></h3>
                      <p><?php echo $keyportofolio['id_category'] ?></p>
                    </figcaption>
                  </figure>
                </a>
             </div>
             <?php } ?>
            </div>
          </div>
          </div>
        </div>
      </section>


    <!-- partners -->

    <section id="partners" class="pp-section section pp-scrollable d-flex align-items-center position-absolute">
        <div class="intro">
          <div class="container">
            <h2><span class="text-primary">Best</span> Partners.</h2>
            <div class="mt-5 pt-5">
              <div class="row-partners row">
               <?php foreach ($rowclient as $keyclient) { ?>
                
                  <div class="col-partner col-md-6 col-lg-3 mb-5 d-flex justify-content-center align-items-center">
                     <img src="admin/uploads/client/<?php echo $keyclient['image'] ?>">
                  </div>
               <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
