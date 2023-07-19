<?php 
$catagory_info=$obj->manage_cat();

if(isset($_GET["status"])){
    if($_GET["status"]='edit'){
        $id=$_GET['id'];
        $return_info=$obj->sub_cat_info_by_id($id);
    }
  }
  
  if(isset($_POST['sub_cat_submit'])){
    $update_msg=$obj->update_sub_cat($_POST);
  } 

?>

<div class="container my-4  shadow">
  <h1 class="text-center">Update Sub Category</h1>
  <?php if(isset($update_msg)){echo $update_msg;}?>
  <form action="" method="POST" >
  <div class="mb-3">
  <label for="cat_name" class="form-label">Catagory Name</label>
  <select name="catagory" class="form-control" id="catagory" required>
  <option value="" >Select Category</option>
    <?php while($catagory=mysqli_fetch_assoc($catagory_info)){ ?>
    <option value="<?php echo $catagory['id'] ?>"> <?php echo $catagory['cat_name'] ?> </option>
    <?php }?>
  </select>
 </div>
  <div class="mb-3">
  <label for="sub_category_name" class="form-label">Sub Category Name</label>
  <input type="text" name="sub_category_name" class="form-control" required >
 </div>
 <div class="mb-3">
  <label for="sub_category_status" class="form-label">Sub Category Status</label>
  <select name="sub_category_status" class="form-control" id="sub_category_status">
  <option value="">Select Sub Category status</option>
  <option value="1">Active</option>
  <option value="0">Unactive</option>
 </select>
 </div>
 <input type="hidden" name="btn_id" value="<?php echo $return_info['sub_cat_id']; ?>">
 <input type="submit" value="Update Sub Category" name="sub_cat_submit" class="form-control btn btn-primary" >
 </form>
 </div>