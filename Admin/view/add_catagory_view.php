<?php  
 if(isset($_POST['cat_submit'])){
    $cat_msg=$obj->add_cat($_POST);
 }

?>


<h1 class="text-center">Add Catagory</h1>
<form action="" method="POST">
    <?php if(isset($cat_msg)){echo  $cat_msg;} ?>
<div class="mb-3">
  <label for="cat_name" class="form-label">Catagory Name</label>
  <input type="text" name="cat_name" class="form-control"  >
</div>
<div class="mb-3">
  <label for="cat_discription" class="form-label">Catagory Discription</label>
  <input type="text" name="cat_discription" class="form-control"  >
</div>
<input type="submit" name="cat_submit" class="form-control btn btn-primary" >

</form>