<?php  
if(isset($_POST['sub_cat_submit'])){
    $rtn_msg=$obj->add_tag($_POST);
}

$tag_info=$obj->tag_display();

if(isset($_GET['status'])){
    if($_GET['status']=='delet'){
     $id=$_GET['id'];
     $delete_tag_msg=$obj->delet_tag($id);
    }
}


?>

<!--add tag start---->
  <div class="container my-3 py-3 shadow">
  <h1 class="text-center">Add Tag</h1>
  <?php if(isset($rtn_msg)){echo $rtn_msg;}?>
  <form action="" method="POST" >
  <div class="mb-3">
  <label for="tag_name" class="form-label">Name</label>
  <input type="text" name="tag_name" class="form-control" required >
 </div>
 <div class="mb-3">
  <label for="tag_status" class="form-label">Tag Status</label>
  <select name="tag_status" class="form-control" id="tag_status">
  <option value="">Select tag status</option>
  <option value="1">Active</option>
  <option value="0">Unactive</option>
 </select>
 </div>
 <input type="submit" value="Add Tag" name="sub_cat_submit" class="form-control btn btn-primary" >
 </form>
 </div>
 <!--add tag end---->

 <!--tag details table start---->

 <div class="container my-4 p-4 shadow">
<h1 class="text-center mt-1">Manage Tag</h1>
<?php if(isset($delete_tag_msg)){echo  $delete_tag_msg;} ?>
       <table class="table table-responsive">
           <thead>
             <tr>
               <th>S/N</th>
               <th>Tag Name</th>
               <th>Tag Status</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            
            <?php 
            $serial_num=1;
            while($tag_data=mysqli_fetch_assoc($tag_info)){?>
            <tr>
            <td><?php echo $serial_num++;?></td>
               <td><?php echo $tag_data['tage_name']?></td>
               <td><?php echo $tag_data['tag_status']?></td>
               <td>
                  <a class="btn btn-outline-success my-2"  href="./edit_tag.php?status=edit&&id=<?php echo $tag_data['tag_id']?>">Edit</a>
                  <a class="btn btn-outline-danger my-2" href="?status=delet&&id=<?php echo $tag_data['tag_id']?>">Delet</a>
               </td>
            </tr>
            <?php }?>
           </tbody>
       </table>  
     </div>

  <!--tag details table end---->

 