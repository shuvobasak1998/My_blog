<?php  
   $rtn_cat_info=$obj->manage_cat();

?>
<div class=" my-4 p-4 shadow">
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
                  <a class="btn btn-outline-success my-2" href="">Edit</a>
                  <a class="btn btn-outline-danger my-2" href="">Delet</a>
               </td>
            </tr>
            <?php }?>
           </tbody>
       </table>


     </div>
