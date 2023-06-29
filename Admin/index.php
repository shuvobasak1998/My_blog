  <?php 
  session_start();
   include('class/function.php');
   
   $obj=new my_blog();   
   if(isset($_SESSION['admin_id'])){
    header("location:dashbord.php");
   }  
   
   if(isset($_POST["submit"])){
    $obj->login_info($_POST);
   }  
  ?> 
  
  <?php require 'includes/head.php';  ?>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login </h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name="admin_email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="admin_pass" placeholder="Enter password" />
                                            </div>
                                        
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary"  type="submit" name="submit" value="login" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        
            <div id="layoutAuthentication_footer">
             <?php require 'includes/footer.php';  ?> 
            </div>
        </div>
            <?php require 'includes/script.php';  ?> 
    </body>
</html>
