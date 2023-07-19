<?php  
   $rtn_cat_info=$obj->manage_cat();


   if(isset($_POST['cat_submit'])){
    $cat_msg=$obj->add_cat($_POST);
   }


   if(isset($_GET["status"])){
      if($_GET["status"]='delet'){
          $id=$_GET['id'];
          $delete_msg=$obj->delet_category($id);
      }
    }

?>
<!--add category start---->
<div class="container my-4 p-4 shadow">
<h1 class="text-center">Add Category</h1>
<form action="" method="POST" >
    <?php if(isset($cat_msg)){echo  $cat_msg;} ?>
<div class="mb-3">
  <label for="cat_name" class="form-label">Catagory Name</label>
  <input type="text" name="cat_name" class="form-control" required >
</div>
<div class="mb-3">
  <label for="cat_discription" class="form-label">Catagory Discription</label>
  <input type="text" name="cat_discription" class="form-control" required >
</div>
<input type="submit" value="Add Category" name="cat_submit" class="form-control btn btn-primary" >
</form>
</div>

<!--add category end---->

<!--Manage category start---->
<div class="container my-4 p-4 shadow">
<h1 class="text-center mt-1">Manage Category</h1>
<?php if(isset($delete_msg)){echo $delete_msg;} ?>
       <table class="table table-responsive">
           <thead>
             <tr>
               <th>ID</th>
               <th>Catagory Name</th>
               <th>Catagory Discription</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <?php while($cat_info=mysqli_fetch_assoc($rtn_cat_info)){?>
            <tr>
               <td><?php echo $cat_info['id']?></td>
               <td><?php echo $cat_info['cat_name']?></td>
               <td><?php echo $cat_info['cat_discreption']?></td>
               <td>
                  <a class="btn btn-outline-success my-2"  href="./edit_catagory.php?status=edit&&id=<?php echo $cat_info['id']?>">Edit</a>
                  <a class="btn btn-outline-danger my-2" href="?status=delet&&id=<?php echo $cat_info['id']?>">Delet</a>
               </td>
            </tr>
            <?php }?>
           </tbody>
       </table>  
     </div>
     <!--manage category end---->
