
<section id="home" class="pp-section pp-scrollable d-flex align-items-center section position-absolute d-block" role="main">
        <div class="intro">

            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-5">
                  <h3 class="text-uppercase">My name is <span class="text-primary"><?php echo $rowsetting['firstname'] ?> <?php echo $rowsetting['lastname'] ?>.<br> I am a </span><?php echo $rowabout['title'] ?></h3>
                  <div class="mt-5 pt-2">
                    <p><?php echo $rowabout['content'] ?></p>
                    <div class="mt-5 experience d-flex align-items-center">
                      <div class="experience-number v2"><span class="position-relative"><?php echo $rowexp['how_long'] ?></span></div><div class="text-dark mt-3 ml-4"><?php echo $rowexp['time'] ?><br> of experience</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-5 offset-lg-2 offset-md-1 mt-4">
                  <?php foreach ($rowskills as $keyskills) { ?>
                    <h6><?php echo $keyskills['skill'] ?></h6>
                  <div class="progress mb-5">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $keyskills['proficient'] ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <?php } ?>
                  
                </div>
              </div>

          </div>
        </div>
      </section>


<!-- trailers -->


<section id="video" class="pp-section navbar-is-white section pp-scrollable d-flex align-items-center position-absolute" style="background-image:url('admin/uploads/trailers/<?php echo $rowtrailers ['image'] ?>');">
        <div class="intro">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6 col-lg-5">
                <h2 class="h1 text-white"><span class="text-primary">Watch</span><br>Video.</h2>
                <p class="lead mt-4 mb-5 text-white"><?php echo $rowtrailers ['caption'] ?></p>
                <a href="<?php echo $rowtrailers ['url'] ?>" class="popup-youtube icon-video-play"></a>
              </div>
            </div>
          </div>
        </div>
      </section>
