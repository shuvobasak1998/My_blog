<?php  
 $catagory_name=$obj->manage_cat();
 
 
 if(isset($_POST["post_submit"])){
    $return_msg = $obj->add_post($_POST);

  }
  

?>

<h1 class="text-center">Add Blog Post</h1>
<?php if(isset($return_msg )){echo $return_msg; }?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
  <label for="post_title" class="form-label mb-1">Post Title</label>
  <input type="text" name="post_title" class="form-control py-4"  >
</div>
<div class="form-group">
  <label for="post_catagory" class="form-label mb-1">Select Post Catagory</label><br>
  <select name="post_catagory" class="form-control" id="post_catagory">
  <option value="" >Select Category</option>
    <?php while($catagory=mysqli_fetch_assoc($catagory_name)){ ?>
    <option value="<?php echo $catagory['id'] ?>"> <?php echo $catagory['cat_name'] ?> </option>
    <?php }?>
  </select>
</div>
<div class="form-group">
  <label for="post_sub_catagory" class="form-label mb-1">Select Post sub Catagory</label><br>
  <select name="post_sub_catagory" class="form-control" id="post_sub_catagory">
  <option value="" >Select Sub Category</option>
    <option value=""> </option>
  </select>
</div>
<div class="form-group">
  <label for="post_content" class="form-label mb-1">Post Content</label>
  <textarea  name="post_content" class="form-control py-4" rows="10"></textarea>
</div>
<div class="form-group">
  <label for="post_img" class="form-label mb-1">Upload Thumbnail</label><br>
  <input type="file" name="post_img" id="post_img"  >
</div>

<div class="form-group">
  <label for="post_summery" class="form-label mb-1">Post Summery</label>
  <input type="text" name="post_summery" id="post_summery" class="form-control py-4"  >
</div>
<div class="form-group">
  <label for="post_tag" class="form-label mb-1">Post Tags</label>
  <input type="text" name="post_tag" class="form-control py-4"  >
</div>
<div class="form-group">
  <label for="post_status" class="form-label mb-1">Select Post Status</label>
 <select name="post_status" class="form-control" id="post_status">
 <option value="1">Published</option>
 <option value="0">Unpublished</option>
 </select>
</div>
<input type="submit" name="post_submit" value="Add Post" class="form-control btn btn-primary my-2" >

</form>