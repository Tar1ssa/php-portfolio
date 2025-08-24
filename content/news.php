<section id="home" class=" section pp-scrollable d-flex position-absolute align-items-center bg-light d-block">
      <div class="intro">
          <div class="container">
          <h2><span class="text-primary">Last</span> News.</h2>
          <div class="mt-5 pt-4">
            <div class="row-news row">
              <?php 
              $count = 0;
              foreach ($rowblog as $keyblog) {
                
                $dateblog = $keyblog['created_at'];
                $dateblog = date("M d", strtotime($dateblog));
                 $value = $count + 100;?>
                <div class="col-news col-md-6 col-lg-4"  >
                  <figure class="position-relative h-100 d-flex flex-column">
                    <div class="position-relative" >
                      <div class="">
                      <a href="?page=blog-details&id=<?php echo $keyblog['id'] ?>" class=""><img alt="" style="height: 10rem; object-fit: cover;" class="d-block w-100 img-fluid" src="admin/uploads/blog/<?php echo $keyblog['image']?>"></a>
                      <mark class="date"><?php echo $dateblog; ?></mark>
                      </div>
                    </div>
                    <figcaption class="d-flex flex-column h-100 overflow-hidden" style="width: 95%;"><h5><a href="?page=blog-details&id=<?php echo $keyblog['id'] ?>"><?php echo $keyblog['title'] ?></a></h5><?php echo $keyblog['content'] ?>
                      <div class="mt-auto">
                                <div class="d-flex align-items-center ">
                                    <i class="bi bi-folder2"></i> <span
                                        class="ps-2">/<?php echo (isset($keyblog['id_category'])) ? $keyblog['category_name'] : '' ?></span>
                                </div>
                      </div>
                    </figcaption>
                  </figure>
                </div>
                
              <?php
            $count++;
            } ?>
              
           </div>
          </div>
        </div>
      </div>
    </section>