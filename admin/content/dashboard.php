<?php 
    $name = $_SESSION['NAME'];
?>             
             
             <div class="pagetitle">
                 <h1>Dashboard</h1>
                 <nav>
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                         <li class="breadcrumb-item">Pages</li>
                         <li class="breadcrumb-item active">Blank</li>
                     </ol>
                 </nav>
             </div><!-- End Page Title -->

             <section class="section">
                 <div class="row">
                     <div class="col-lg-12">
                        <h1>Welcome <?php echo $name; ?></h1>
                         

                     

                         

                     </div>
                 </div>

             </section>