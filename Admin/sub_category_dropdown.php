<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "blog_project";
$conn=mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn){
      die();
    }
    
   
    $category_id = $_POST["category_id"];
    $result = mysqli_query($conn,"SELECT * FROM subcategory where cat_id = $category_id");
?>




<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["sub_cat_id"];?>"><?php echo $row["sub_cat_name"];?></option>
<?php
}
?>
