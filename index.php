<?php 
 include ("Admin/class/function.php");

  $obj= new my_blog();
  $get_cat=$obj->manage_cat();



?>

<?php include ('includes/head.php')?>

  <body>
    <!-- ***** Preloader Start ***** -->
    <?php include ('includes/preloader.php')?>
    <!-- ***** Preloader End ***** -->

    <!-- navbar start -->
    <?php include ('includes/navbar.php')?>
    <!-- navbar end -->

    <!-- Page Content -->

    <!-- Banner Starts Here -->
    <?php include ('includes/banner.php')?>
    <!-- Banner Ends Here -->

    <!-- advartise section Starts Here -->
    <?php include ('includes/advartise_section.php')?>
    <!-- advartise section Ends Here -->

    <section class="blog-posts">
      <div class="container">
        <div class="row">

        <!-- main_post Starts Here(left) -->
        <?php include ('includes/main_post.php')?>
        <!-- main_post Ends Here(left) -->

         <!-- side_post Starts Here(right) -->
         <?php include ('includes/side_post.php')?>
        <!-- side_post Ends Here(right) -->

        </div>
      </div>
    </section>

    <!-- footer Starts Here -->
    <?php include ('includes/footer.php')?>
    <!-- footer Ends Here -->
    

    <!-- Bootstrap core JavaScript start-->
    <?php include ('includes/script.php')?>
     <!-- Bootstrap core JavaScript end-->
    
  </body>
</html>