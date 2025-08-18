<nav id="navbar-mobile" class="navbar navbar-mobile">
      <ion-icon class="close" name="close-outline"></ion-icon>

      <!-- Social -->
      <ul class="social-icons mr-auto mr-lg-0">
         <li><a href="<?php echo $rowsetting['facebook'] ?>"><i class="bi bi-facebook"></i></a></li>
           <li><a href="<?php echo $rowsetting['twitter'] ?>"><i class="bi bi-twitter-x"></i></li>
           <li><a href="<?php echo $rowsetting['linkedin'] ?>"><i class="bi bi-linkedin "></i></a></li>
           <li><a href="<?php echo $rowsetting['instagram'] ?>"><i class="bi bi-instagram"></i></a></li>
      </ul>

      <ul class="navbar-nav navbar-nav-mobile">
        <li class="active"><a class="nav-link" data-menuanchor="home" href="#home">Home</a></li>
        <li><a class="nav-link" data-menuanchor="about" href="#about">About</a></li>
        <li><a class="nav-link" data-menuanchor="video" href="#video">Trailer</a></li>
        <li><a class="nav-link" data-menuanchor="experience" href="#experience">Experience</a></li>
        <li><a class="nav-link" data-menuanchor="specialization" href="#specialization">Specialization</a></li>
        <li><a class="nav-link" data-menuanchor="projects" href="#projects">Projects</a></li>
        <li><a class="nav-link" data-menuanchor="partners" href="#partners">Partners</a></li>
        <li><a class="nav-link" data-menuanchor="news" href="#news">News</a></li>
       </ul>
       <div class="navbar-mobile-footer">
        <p>© <span id="currentYear"></span> <?php echo $rowsetting['firstname'] ?>. All Rights Reserved.</p>
       </div>
    </nav>