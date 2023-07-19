<?php 

if(isset($_GET["status"])){
    if($_GET["status"]='edit'){
        $id=$_GET['id'];
        $return_info=$obj->cat_info_by_id($id);
    }
  }

  
  if(isset($_POST['cat_submit'])){
    $update_msg=$obj->update_cat($_POST);
  } 


?>

<div class="container my-4 p-4 shadow">
<h1 class="text-center">Update Category</h1>
<form action="" method="POST" >
    <?php if(isset($update_msg)){echo $update_msg;} ?>
<div class="mb-3">
  <label for="cat_name" class="form-label">Catagory Name</label>
  <input type="text" name="u_cat_name" class="form-control" required value="<?php echo $return_info['cat_name']; ?>">
</div>
<div class="mb-3">
  <label for="cat_discription" class="form-label">Catagory Discription</label>
  <input type="text" name="u_cat_discription" class="form-control" required value="<?php echo $return_info['cat_discreption']; ?>">
</div>
<input type="hidden" name="btn_id" value="<?php echo $return_info['id']; ?>">
<input type="submit" value="Update Category" name="cat_submit" class="form-control btn btn-primary" >
</form>
</div>