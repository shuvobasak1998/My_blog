<?php  
  

?>
<div>
  <a class="btn btn-lg btn-outline-success my-3 mx-5 p-2" data-bs-toggle="collapse" href="add_post.php" role="button" aria-expanded="false" aria-controls="collapseExample">
    Creat New Post
  </a>
</div>

<div class=" container my-4 p-4 shadow">
       <table class="table table-responsive">
           <thead>
             <tr>
               <th>ID</th>
               <th>Title</th>
               <th>Image</th>
               <th>Catagory</th>
               <th>Content</th>
               <th>Author</th>
               <th>Date</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <!---<?php while($post=mysqli_fetch_assoc($post_info)){?>
            <tr>
               <td><?php echo $post['post_id']?></td>
               <td><?php echo $post['post_title']?></td>
               <td><img style="height: 100px;" src="../IMAGE/<?php echo $post['post_img']?>" alt=""></td>
               <td><?php echo $post['cat_name']?></td>
               <td><?php echo $post['post_content']?></td>
               <td><?php echo $post['post_author']?></td>
               <td><?php echo $post['post_date']?></td>
               <td><?php echo $post['post_status']?></td>
               <td>
                  <a class="btn btn-outline-success my-2" href="">Edit</a>
                  <a class="btn btn-outline-danger my-2" href="?status=delet&&id=<?php echo $cat_info['id']?>">Delet</a>
               </td>
            </tr>
            <?php }?>-->
           </tbody>
       </table>  


     </div>
