<?php 
  include('class/function.php');
  $obj= new my_blog();

  session_start();
  $id=$_SESSION['admin_id'];

  if($id==null){
    header("location:index.php");
  }
  

  if(isset($_GET['admin_logout'])){
    if($_GET['admin_logout']=='logout'){
        $obj->logout();
    }

  }


?>

<?php require 'includes/head.php';  ?>

 

    <body class="sb-nav-fixed">
    <?php require 'includes/topnav.php';  ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php require 'includes/sidenav.php';  ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <?php 
                           if(isset($view)){
                            if( $view=="dashbord"){
                                include('view/dashbord_view.php');
                            }elseif( $view=="catagory"){
                                include('view/catagory_view.php');
                            }elseif( $view=="sub_catagory"){
                                include('view/sub_catagory_view.php');
                            }elseif( $view=="add_post"){
                                include('view/add_post_view.php');
                            }elseif( $view=="manage_post"){
                                include('view/manage_post_view.php');
                            }elseif( $view=="edit_catagory"){
                                include('view/edit_catagory_view.php');
                            }elseif( $view=="edit_sub_catagory"){
                                include('view/edit_subcategory_view.php');
                            }elseif( $view=="tag"){
                                include('view/tag_view.php');
                            }elseif( $view=="edit_tag"){
                                include('view/edit_tag_view.php');
                            }elseif( $view=="edit_post"){
                                include('view/edit_post_view.php');
                            }
                           }
                       ?>


                    </div>
                </main>
             <?php require 'includes/footer.php';  ?>  
            </div>
        </div>
        <?php require 'includes/script.php';  ?> 


        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  $(document).ready(function() {
  $('#category-dropdown').on('change', function() {
  var category_id = this.value;
  console.log(category_id);
  $.ajax({
  url: "sub_category_dropdown.php",
  type: "POST",
  data: {
  category_id: category_id
  },
  cache: false,
  success: function(result){
    console.log(result);
  $("#sub-category-dropdown").html(result);
  }
  });
  });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>



 </body>
</html>
