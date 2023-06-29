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

}   




?>