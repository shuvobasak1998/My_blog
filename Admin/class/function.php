<?php 
   class my_blog{
    private $conn;
    public function __construct(){
        $db_host='localhost';
        $db_user='root';
        $db_pass='';
        $db_name='blog_project';

        $this->conn = mysqli_connect( $db_host,$db_user,$db_pass,$db_name);

        if(!$this->conn){
            die("database connection error!!");

        }
      
    }

    public function login_info($data){
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);

        $query="SELECT * FROM admin_login WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";

        if(mysqli_query($this->conn,$query)){
           $login_data=mysqli_query($this->conn,$query);

          if(isset($login_data)){
             header("location:dashbord.php");
             $login=mysqli_fetch_assoc($login_data);

             session_start();
             $_SESSION['admin_id']= $login['ID'];
             $_SESSION['admin_pass']= $login['admin_pass'];  

          }

        }

    }

    public function logout(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_pass']);
        header('location:index.php');
        
    }

    public function add_cat($data){
        $cat_name=$data['cat_name'];
        $cat_dis=$data['cat_discription'];

        $query="INSERT INTO add_catagory(cat_name,cat_discreption) VALUES ('$cat_name','$cat_dis')";

        if(mysqli_query($this->conn,$query)){
            return "Catagory Added Successfully";
        }
    }

    public function manage_cat(){
        $query="SELECT * FROM add_catagory";
        if(mysqli_query($this->conn,$query)){
         $cat_data=mysqli_query($this->conn,$query);
         return $cat_data;
        }
        
    }

    public function cat_info_by_id($id){
        $query="SELECT * FROM add_catagory WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
         $data=mysqli_query($this->conn,$query);
         $u_data=mysqli_fetch_assoc($data);
         return $u_data;
        }
 
     }

     public function update_cat($data){
        $u_cat_name=$data['u_cat_name'];
        $u_cat_disc=$data['u_cat_discription'];
        $cat_id=$data['btn_id'];
        
        $query_ran="UPDATE add_catagory SET cat_name='$u_cat_name',cat_discreption='$u_cat_disc' WHERE id=$cat_id";

        if(mysqli_query($this->conn,$query_ran)){
          return 'Category Updated Sucessfully!!';
        }
    }

    public function delet_category($id){
        $query="DELETE FROM add_catagory WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
         return "Delete data sucessfully..!!";
        }

    }

     
    public function add_sub_cat($data){
        $sub_cat_name=$data['sub_category_name'];
        $catagory_id=$data['catagory'];
        $sub_category_status=$data['sub_category_status'];

        $query="INSERT INTO subcategory(sub_cat_name,cat_id,sub_status,create_at,update_at) 
                VALUES (' $sub_cat_name',$catagory_id,$sub_category_status,now(),now())";

        if(mysqli_query($this->conn,$query)){
            return " Sub Catagory Added Successfully...!";
        }
    }
    public function sub_cat_manage(){
        $query="SELECT * FROM subcategory";
        if(mysqli_query($this->conn,$query)){
         $sub_cat=mysqli_query($this->conn,$query);
         return $sub_cat;
        }
        
    }

    public function delet_sub_category($id){
        $query="DELETE FROM subcategory WHERE sub_cat_id=$id";
        if(mysqli_query($this->conn,$query)){
         return "Delete Sub-category sucessfully..!!";
        }

    }

    public function sub_cat_info_by_id($id){
        $query="SELECT * FROM subcategory WHERE sub_cat_id=$id";
        if(mysqli_query($this->conn,$query)){
         $sub_cat_data=mysqli_query($this->conn,$query);
         $sub_cat_info=mysqli_fetch_assoc($sub_cat_data);
         return $sub_cat_info;
        }
 
    }

     public function update_sub_cat($data){
        $u_cat_id=$data['catagory'];
        $u_sub_category_name=$data['sub_category_name'];
        $u_sub_category_status=$data['sub_category_status'];
        $sub_cat_id=$data['btn_id'];
        $query_ran="UPDATE subcategory SET sub_cat_name='$u_sub_category_name',cat_id=$u_cat_id,sub_status='$u_sub_category_status' WHERE sub_cat_id=$sub_cat_id";

        if(mysqli_query($this->conn,$query_ran)){
          return 'Sub_Category Updated Sucessfully!!';
        }
    }

    public function add_tag($data){
        $tag_name=$data['tag_name'];
        $tag_status=$data['tag_status'];

        $query="INSERT INTO tag(tage_name,tag_status) 
                VALUES ('$tag_name',$tag_status)";

        if(mysqli_query($this->conn,$query)){
            return "Tag Added Successfully...!";
        }
    }

    public function tag_display(){
        $query="SELECT * FROM tag";
        if(mysqli_query($this->conn,$query)){
         $tag=mysqli_query($this->conn,$query);
         return $tag;
        }
        
    }

    public function delet_tag($id){
        $query="DELETE FROM tag WHERE tag_id=$id";
        if(mysqli_query($this->conn,$query)){
         return "Delete Tag sucessfully..!!";
        }

    }

    public function edit_tag($id){
        $query="SELECT * FROM tag WHERE tag_id=$id";
        if(mysqli_query($this->conn,$query)){
         $tagt_data=mysqli_query($this->conn,$query);
         $tag_info=mysqli_fetch_assoc($tagt_data);
         return $tag_info;
        }
 
     }

     public function update_tag_by_id($data){
        $u_tag_name=$data['tag_name'];
        $u_tag_status=$data['tag_status'];
        $tag_id=$data['btn_id'];
        $query_ran="UPDATE tag SET tage_name='$u_tag_name',tag_status=$u_tag_status WHERE tag_id=$tag_id";

        if(mysqli_query($this->conn,$query_ran)){
          return 'Tag Updated Sucessfully!!';
        }
    }

    public function add_post($data){
        $post_title=isset($data['post_title'])? $data['post_title']: null;
        $post_catagory=isset($data['post_catagory'])? $data['post_catagory']: null;
        $post_sub_catagory=isset($data['post_sub_catagory'])? $data['post_sub_catagory']: null;
        $post_content=isset($data['post_content'])? $data['post_content']: null;
        $post_summery=isset($data['post_summery'])? $data['post_summery']: null;
        $post_tag=isset($data['post_tag'])? $data['post_tag']: null;
        $post_status=isset($data['post_status'])? $data['post_status']: null;
        $meta_title=isset($data['meta_title'])? $data['meta_title']: null;
        $post_img_name=isset($_FILES['post_img']['name'])? $_FILES['post_img']['name']: null;
        $tmp_img_name=isset($_FILES['post_img']['tmp_name'])? $_FILES['post_img']['tmp_name']: null;
        $img_path="Image/".$post_img_name;

        if(move_uploaded_file($tmp_img_name,$img_path)){
        
           $query="INSERT INTO blog_post(category_id,sub_cat_id,post_title,post_details,post_status,thumba_img,create_at,update_at,meta_title,post_tag	) 
                VALUES ($post_catagory,$post_sub_catagory,'$post_title','$post_content',$post_status,'$post_img_name',now(),now(),'$meta_title','$post_tag')";
           $query_ran=mysqli_query($this->conn,$query);
          if($query_ran){
            return 'Post added Sucessfully!!';
           }else{
            return 'Post added failed!!';
            
            }
        }


    }

    public function post_display(){
        $query="SELECT * FROM blog_post";
        if(mysqli_query($this->conn,$query)){
         $post_select=mysqli_query($this->conn,$query);
         return $post_select;
        }
        
    }

    public function delet_post($id){
        $query="DELETE FROM blog_post WHERE post_id=$id";
        if(mysqli_query($this->conn,$query)){
         return "Delete post sucessfully..!!";
        }

    }

    public function edit_post($id){
        $query="SELECT * FROM blog_post WHERE post_id=$id";
        if(mysqli_query($this->conn,$query)){
         $post_data=mysqli_query($this->conn,$query);
         $post_info=mysqli_fetch_assoc($post_data);
         return $post_info;
        }
 
    }

    public function post_sub_category($post_cat_id){
        $query="SELECT * FROM subcategory WHERE cat_id=$post_cat_id";
        if(mysqli_query($this->conn,$query)){
         $post_sub_cat_query=mysqli_query($this->conn,$query);
         return $post_sub_cat_query;
        }
 
    }




}




?>