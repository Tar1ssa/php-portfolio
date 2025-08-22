<?php
include 'admin/koneksi.php';
$querysetting = mysqli_query($koneksi, "SELECT * FROM settings LIMIT 1");
$rowsetting = mysqli_fetch_assoc($querysetting);

$queryhero = mysqli_query($koneksi, "SELECT * FROM hero LIMIT 1");
$rowhero = mysqli_fetch_assoc($queryhero);

$queryabout = mysqli_query($koneksi, "SELECT * FROM about WHERE status= 1 ORDER BY id DESC");
$rowabout = mysqli_fetch_assoc($queryabout);

$queryexp = mysqli_query($koneksi, "SELECT * FROM experience WHERE id=1");
$rowexp = mysqli_fetch_assoc($queryexp);

$querytrailers = mysqli_query($koneksi, "SELECT * FROM trailers WHERE status = 1");
$rowtrailers = mysqli_fetch_assoc($querytrailers);

$queryskills = mysqli_query($koneksi, "SELECT * FROM skills ORDER BY id DESC");
$rowskills = mysqli_fetch_all($queryskills, MYSQLI_ASSOC);

$queryjob = mysqli_query($koneksi, "SELECT * FROM job ORDER BY id DESC");
$rowjob = mysqli_fetch_all($queryjob, MYSQLI_ASSOC);

$queryspec = mysqli_query($koneksi, "SELECT * FROM specialization ORDER BY id DESC");
$rowspec = mysqli_fetch_all($queryspec, MYSQLI_ASSOC);

$querycv = mysqli_query($koneksi, "SELECT cv, id FROM job LIMIT 1");
$rowcv = mysqli_fetch_assoc($querycv);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Richard. - Easy Onepage Personal Template">
  <meta name="author" content="Paul">

  <!-- CSS -->
  <?php
  include 'inc/css.php';
  ?>

  <title>PHP Portfolio</title>
</head>

<body class="fullpage">

  <!-- Loader -->
  <div class="loader">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div>

  <!-- Click capture -->
  <div class="click-capture"></div>

  <!-- Navbar -->
  <?php include 'inc/navbar.php'; ?>

  <!-- Navbar Mobile -->

  <?php include 'inc/navbar-mobile.php'; ?>

  <div id="pagepiling">
    <?php
    if (isset($_GET['page'])) {
      if (file_exists("content/" . $_GET['page'] . ".php")) {
        include "content/" . $_GET['page'] . ".php";
      } else {
        include "content/notfound.php";
      }
    } else {
      // include 'content/index.php';
    }
    ?>
    <!-- Masthead/hero -->
    <?php include 'content/hero.php'; ?>

    <!-- About -->
    <?php include 'content/about.php'; ?>

    <!-- Video -->
    <?php include 'content/trailers.php'; ?>

    <!-- Experience -->
    <?php include 'content/experience.php'; ?>

    <!-- Services -->
    <?php include 'content/services.php'; ?>

    <!-- Projects -->
    <?php include 'content/projects.php'; ?>

    <!-- Partners -->
    <?php include 'content/partners.php'; ?>

    <!-- News -->
    <?php include 'content/news.php'; ?>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="send-request">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title mt-0">Send request</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Leave your contacts and our managers will contact you soon.</p>
          <form class="form-request js-ajax-form">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" required="" placeholder="Email *">
            </div>
            <div class="form-group">
              <textarea rows="3" name="message" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="message" id="success-message">Your message is successfully sent...</div>
            <div class="message" id="error-message">Sorry something went wrong</div>
            <div class="form-group mb-0 text-right">
              <button type="submit" class="btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Project Modal Dialog 1 -->
  <div id="project1" class="container mfp-hide zoom-anim-dialog">
    <h2 class="mt-0">Neuro</h2>
    <div class="mt-5 pt-2 text-dark">
      <div class="row">
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Clients:</h6>
          <span>Ethan Hunt, John Doe</span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Completion:</h6>
          <span>February 5th, 2020</span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Project Type:</h6>
          <span>Illustration</span>
        </div>
        <div class="mb-5 col-md-6 col-lg-3">
          <h6 class="my-0">Authors</h6>
          <span>Logan Cee, Paul</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <h6 class="my-0">Budget:</h6>
          <span>$12000</span>
        </div>
        <div class="col-md-6 col-lg-3">
          <h6 class="my-0">Authors</h6>
          <span>Logan Cee, Paul</span>
        </div>
      </div>
    </div>
    <img alt="" class="mt-5 pt-2 w-100" src="assets/img/portfolio/1140x641-1.jpg">
  </div>

  <!-- Project Modal Dialog 2 -->
  <div id="project2" class="container mfp-hide zoom-anim-dialog">
    <h2 class="mt-0">Neuro</h2>
    <div class="mt-5 pt-2 text-dark">
      <div class="row">
        <div class="col-md-3">
          <h6 class="my-0">Clients:</h6>
          <span>Ethan Hunt, John Doe</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Completion:</h6>
          <span>February 5th, 2020</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Project Type:</h6>
          <span>Illustration</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Authors</h6>
          <span>Logan Cee, Paul</span>
        </div>
      </div>
      <div class="mt-5 row">
        <div class="col-md-3">
          <h6 class="my-0">Budget:</h6>
          <span>$12000</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Authors</h6>
          <span>Logan Cee, Paul</span>
        </div>
      </div>
    </div>
    <img alt="" class="mt-5 pt-2 w-100" src="assets/img/portfolio/1140x641-2.jpg">
  </div>

  <!-- Project Modal Dialog 3 -->
  <div id="project3" class="container mfp-hide zoom-anim-dialog">
    <h2 class="mt-0">Neuro</h2>
    <div class="mt-5 pt-2 text-dark">
      <div class="row">
        <div class="col-md-3">
          <h6 class="my-0">Clients:</h6>
          <span>Ethan Hunt, John Doe</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Completion:</h6>
          <span>February 5th, 2020</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Project Type:</h6>
          <span>Illustration</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Authors</h6>
          <span>Logan Cee, Paul</span>
        </div>
      </div>
      <div class="mt-5 row">
        <div class="col-md-3">
          <h6 class="my-0">Budget:</h6>
          <span>$12000</span>
        </div>
        <div class="col-md-3">
          <h6 class="my-0">Authors</h6>
          <span>Logan Cee, Paul</span>
        </div>
      </div>
    </div>
    <img alt="" class="mt-5 pt-2 w-100" src="assets/img/portfolio/1140x641-3.jpg">
  </div>

  <!-- Optional JavaScript -->
  <script>
    function formatPhoneNumber(raw) {
      // Remove any non-digit characters
      const digits = raw.replace(/\D/g, '');

      // Assume it's an Indonesian mobile number starting with country code
      const countryCode = digits.slice(0, 2); // "62"
      const part1 = digits.slice(2, 5); // "888"
      const part2 = digits.slice(5, 9); // "7777"
      const part3 = digits.slice(9); // "7777"

      return `(+${countryCode}) ${part1} ${part2} ${part3}`;
    }

    const rawPhone = "<?php echo $rowsetting['phone'] ?>"; // This would come from your database
    const formatted = formatPhoneNumber(rawPhone);
    document.getElementById("phone-number").textContent = formatted;
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var currentYear = new Date().getFullYear();
      document.getElementById('currentYear').textContent = currentYear;
    });
  </script>

  <script src="assets/js/jquery-1.12.4.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- <script src="assets/ionicons.js"></script> -->
  <script src="assets/js/jarallax.min.js"></script>
  <script src="assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.pagepiling.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/interface.js"></script>
</body>

</html>