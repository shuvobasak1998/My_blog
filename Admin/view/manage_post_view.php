<?php  
  $post_info=$obj->post_display();
  $catagory_name=$obj->manage_cat();

  if(isset($_GET["status"])){
    if($_GET["status"]='delet'){
        $id=$_GET['id'];
        $delete_msg=$obj->delet_post($id);
    }
  }

?>
<div>
  <a class="btn btn-lg btn-outline-success my-3 mx-5 p-2" data-bs-toggle="collapse" href="add_post.php" role="button" aria-expanded="false" aria-controls="collapseExample">
    Creat New Post
  </a>
</div>
<h1 class="text-center mt-3">Manage Post</h1>

<div class="mt-5">
       <table class="table">
           <thead>
             <tr>
               <th>S/N</th>
               <th>Title</th>
               <th>Catagory</th>
               <th>Sub_Catagory</th>
               <th>Image</th>
               <th>Details</th>
               <th>Author</th>
               <th>Create Date</th>
               <th>Update Date</th>
               <th>Post Tag</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <?php 
             $serialno=1;
            while($post=mysqli_fetch_assoc($post_info)){?>
            <tr>
               <td><?php  echo $serialno++ ?></td>
               <td><?php echo $post['post_title']?></td>
               <td><?php echo $post['category_id']?></td>
               <td><?php echo $post['sub_cat_id']?></td>
               <td><img style="height: 100px;" src="./Image/<?php echo $post['thumba_img']?>" alt=""></td>
               <td><?php echo $post['post_details']?></td>
               <td><?php echo 'Admin';?></td>
               <td><?php echo $post['create_at']?></td>
               <td><?php echo $post['update_at']?></td>
               <td><?php echo $post['post_tag']?></td>
               <td><?php echo $post['post_status']?></td>
               <td>
                  <a class="btn btn-outline-success my-2" href="edit_post.php?status=edit&&id=<?php echo $post['post_id']?>">Edit</a>
                  <a class="btn btn-outline-danger my-2" href="?status=delet&&id=<?php echo $post['post_id']?>">Delet</a>
               </td>
            </tr>
            <?php }?>
           </tbody>
       </table>  


     </div>
