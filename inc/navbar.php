<nav id="scrollspy" class="navbar navbar-desctop">
        
      <div class="d-flex position-relative w-100">

        <!-- Brand-->
        <a class="navbar-brand" href="#"><?php echo $rowsetting['firstname'] ?>.</a>

        <!-- Social -->
        <ul class="social-icons mr-auto mr-lg-0 d-none d-sm-block">
           <li><a href="<?php echo $rowsetting['facebook'] ?>"><i class="bi bi-facebook"></i></a></li>
           <li><a href="<?php echo $rowsetting['twitter'] ?>"><i class="bi bi-twitter-x"></i></li>
           <li><a href="<?php echo $rowsetting['linkedin'] ?>"><i class="bi bi-linkedin "></i></a></li>
           <li><a href="<?php echo $rowsetting['instagram'] ?>"><i class="bi bi-instagram"></i></a></li>
        </ul>

        <span class="phone h6 my-0 d-none d-md-block" id="phone-number"><?php echo $rowsetting['phone'] ?></span>

        <!-- Toggler -->
        <button class="toggler ml-auto">
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
        </button>
      </div>
    </nav>