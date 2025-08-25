<?php
include 'admin/koneksi.php';
include 'inc/query.php';

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
      include 'content/hero.php';
    }
    ?>
    </div>
    <!-- Masthead/hero -->



    <!-- About -->


    <!-- Video -->


    <!-- Experience -->


    <!-- Services -->


    <!-- Projects -->


    <!-- Partners -->


    <!-- News -->




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
                    <form class="form-request" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="" placeholder="Email *">
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="text" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="message" id="success-message">Your message is successfully sent...</div>
                        <div class="message" id="error-message">Sorry something went wrong</div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" name="simpan" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Modal Dialog 1 -->
    <?php include 'content/projects-modal.php'; ?>

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