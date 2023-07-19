<?php  
if(isset($_GET['status'])){
    if($_GET['status']=='edit'){
     $id=$_GET['id'];
     $rtn_tag=$obj->edit_tag($id);
    }
}

if(isset($_POST['update_tag'])){
    $update_tag_msg=$obj->update_tag_by_id($_POST);
}


?>

<!--add tag start---->
<div class="container my-3 py-3 shadow">
  <h1 class="text-center">Update Tag</h1>
  <?php if(isset($update_tag_msg)){echo $update_tag_msg;} ?>
  <form action="" method="POST" >
  <div class="mb-3">
  <label for="tag_name" class="form-label">Name</label>
  <input type="text" name="tag_name" class="form-control" value="<?php echo $rtn_tag['tage_name'];?>
" required >
 </div>
 <div class="mb-3">
  <label for="tag_status" class="form-label">Tag Status</label>
  <select name="tag_status" class="form-control" id="tag_status">
  <option value="">Select tag status</option>
  <option value="1">Active</option>
  <option value="0">Unactive</option>
 </select>
 </div>
 <input type="hidden" name="btn_id" value="<?php echo $rtn_tag['tag_id']; ?>">
 <input type="submit" value="Add Tag" name="update_tag" class="form-control btn btn-primary" >
 </form>
 </div>
 <!--add tag end---->