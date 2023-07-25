<?php  
 $catagory_name=$obj->manage_cat();
 $tag_info=$obj->tag_display();

 if(isset($_POST['post_submit'])){
  $post=$obj->add_post($_POST);
 }

  

?>

<h1 class="text-center">Add Blog Post</h1>
<?php if(isset($post )){echo $post; }?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
  <label for="post_title" class="form-label mb-1">Post Title</label>
  <input type="text" name="post_title" class="form-control py-4" required >
</div>
<div class="form-group">
  <label for="post_catagory" class="form-label mb-1">Select Post Catagory</label><br>
  <select name="post_catagory" class="form-control" id="category-dropdown" required >
  <option value="" >Select Category</option>
    <?php while($catagory=mysqli_fetch_assoc($catagory_name)){ ?>
    <option value="<?php echo $catagory['id'] ?>"> <?php echo $catagory['cat_name'] ?> </option>
    <?php }?>
  </select>
</div>
<div class="form-group">
  <label for="post_sub_catagory" class="form-label mb-1">Select Post sub Catagory</label><br>
  <select name="post_sub_catagory" class="form-control" id="sub-category-dropdown" required >


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
  <select name="post_tag" class="js-example-basic-multiple form-control" multiple="multiple" required >
  <option value="" >Select Tag</option>
    <?php while($tag=mysqli_fetch_assoc($tag_info)){ ?>
    <option value="<?php echo $tag['tag_id'] ?>"> <?php echo $tag['tage_name'] ?> </option>
    <?php }?>
  </select>
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