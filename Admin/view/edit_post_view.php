<?php  
 $catagory_name=$obj->manage_cat();
 
 if(isset($_POST['post_submit'])){
  $post_update=$obj->add_post($_POST);
 }

 if(isset($_GET["status"])){
    if($_GET["status"]='edit'){
        $id=$_GET['id'];
        $post=$obj->edit_post($id);
    }
  }
  


  if(isset($post['category_id'])){
    $post_cat_id=$post['category_id'];
    $post_sub_category_data=$obj->post_sub_category($post_cat_id);

  }

?>

<h1 class="text-center">Add Blog Post</h1>
<?php if(isset($post_update )){echo $post_update; }?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
  <label for="post_title" class="form-label mb-1">Post Title</label>
  <input type="text" name="post_title" class="form-control py-4" required value="<?php echo $post['post_title']?>" >
</div>
<div class="form-group">
  <label for="post_catagory" class="form-label mb-1">Select Post Catagory</label><br>
  <select name="post_catagory" class="form-control" id="category-dropdown" required >

    <?php while($catagory=mysqli_fetch_assoc($catagory_name)){ ?>
    <option <?php if($catagory['id']== $post['category_id']){
               echo "selected";
    } ?>   value="<?php echo $catagory['id'] ?>"> <?php echo $catagory['cat_name'] ?> </option>
    <?php }?>
  </select>
</div>
<div class="form-group">
  <label for="post_sub_catagory" class="form-label mb-1">Select Post sub Catagory</label><br>
  <select name="post_sub_catagory" class="form-control" id="sub-category-dropdown" required >
  <?php while($post_sub_cat_info=mysqli_fetch_assoc($post_sub_category_data)){ ?>
    <option <?php if($post_sub_cat_info['sub_cat_id'] == $post['sub_cat_id']){
               echo "selected";
    } ?> value="<?php echo $post_sub_cat_info['sub_cat_id'] ?>" >  <?php echo $post_sub_cat_info['sub_cat_name'] ?>   </option>
    <?php }?>

  </select>
</div>
<div class="form-group">
  <label for="post_content" class="form-label mb-1">Post Content</label>
  <textarea  name="post_content" class="form-control py-4" rows="10" required></textarea>
</div>
<div class="form-group">
  <label for="post_img" class="form-label mb-1" required>Upload Thumbnail</label><br>
  <input type="file" name="post_img" id="post_img"  >
</div>

<div class="form-group">
  <label for="post_summery" class="form-label mb-1">Post Summery</label>
  <input type="text" name="post_summery" id="post_summery" class="form-control py-4"  >
</div>
<div class="form-group">
  <label for="post_tag" class="form-label mb-1">Post Tags</label>
  <input type="text" name="post_tag" class="form-control py-4" required>
</div>
<div class="form-group">
  <label for="meta_title" class="form-label mb-1">Meta Title</label>
  <input type="text" name="meta_title" class="form-control py-4" required >
</div>
<div class="form-group">
  <label for="post_status" class="form-label mb-1">Select Post Status</label>
 <select name="post_status" class="form-control" id="post_status" required >
 <option value="1">Published</option>
 <option value="0">Unpublished</option>
 </select>
</div>
<input type="submit" name="post_submit" value="Add Post" class="form-control btn btn-primary my-2" >

</form>