<?php  
 $catagory_info=$obj->manage_cat();
 $sub_cat_info=$obj->sub_cat_manage();

 if(isset($_POST['sub_cat_submit'])){
    $sub_cat_msg=$obj->add_sub_cat($_POST);
  }

  if(isset($_GET["status"])){
    if($_GET["status"]='delet'){
        $id=$_GET['id'];
        $delete_msg=$obj->delet_sub_category($id);
    }
  }

?>


<!--sub_category form start-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <a href="#demo" class="btn btn-success " data-bs-toggle="collapse">Add Subcategory</a>
  <div id="demo" class="collapse">
  <div class="container my-4  shadow">
  <h1 class="text-center">Add New Sub Category</h1>
  <?php if(isset($sub_cat_msg)){echo $sub_cat_msg;}?>
  <?php if(isset($delet_msg)){echo $delet_msg;}?>
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
 <input type="submit" value="Add Sub Category" name="sub_cat_submit" class="form-control btn btn-primary" >
 </form>
 </div>
  </div>
</div>
</body>
</html>

<!--sub_category form end-->

<!--sub_category table start-->
<div class="container my-4 p-4 shadow">
<h1 class="text-center my-3">Manage Sub Category</h1>
<?php if(isset($delete_msg)){echo $delete_msg;} ?>
       <table class="mx-5 table table-responsive">
           <thead>
             <tr>
               <th>ID</th>
               <th>Sub Category Name</th>
               <th>Category</th>
               <th>Status</th>
               <th>Created At</th>
               <th>Updated At</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <?php while($sub_cat_row=mysqli_fetch_assoc($sub_cat_info)){?>
            <tr>
               <td><?php echo $sub_cat_row['sub_cat_id']?></td>
               <td><?php echo $sub_cat_row['sub_cat_name']?></td>
               <td><?php echo $sub_cat_row['cat_id']?></td>
               <td><?php echo $sub_cat_row['sub_status']?></td>
               <td><?php echo $sub_cat_row['create_at']?></td>
               <td><?php echo $sub_cat_row['update_at']?></td>
               <td>
                  <a class="btn btn-outline-success my-2" href="./edit_subcategory.php?status=edit&&id=<?php echo $sub_cat_row['sub_cat_id']?>">Edit</a>
                  <a class="btn btn-outline-danger my-2" href="?status=delet&&id=<?php echo $sub_cat_row['sub_cat_id']?>">Delet</a>
               </td>
            </tr>
            <?php }?>
           </tbody>
       </table>  
     </div>
     <!--sub_category table end-->
