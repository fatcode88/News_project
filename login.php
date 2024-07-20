<?php
include('./conn.php');


if (isset($_POST['submit'])) {
  $full_name = $_POST['f_name'];
  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $active = isset($_POST['active'])? 'Yes': 'No';
  $pass = $_POST['password'];
  $image = $_POST['user_image'];
  $date = date('Y-m-d');
 
  $check="SELECT * FRoM users WHERE user_name='$user_name'";
  $result=$conn->query($check);
  if($result->num_rows>0){
    echo "User name Already Exists !";
  } 
  else{
    $insertquery="INSERT INTO users(name,user_name,email,active,password,user_image,registation_date)
    VALUES('$full_name','$user_name','$email','$active','$pass','$image','$date')";
    if($conn->query($insertquery)==TRUE){
      header("Location: index.php");
    }
    else{
      echo "Error:".$conn->error;
    }
  }
}
if(isset($_POST['login'])){
  $user_name=$_POST['user_name'];
  $password=$_POST['password'];
  $sql="SELECT * FROM users WHERE user_name='$user_name' and password='$password'";
  $result=$conn->query($sql);
  if($result->num_row>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['user_name']=$row['user_name'];
    header("Location: index.php");
    exit();

  }
  else{
    echo "Incorrect user name or password";
  }
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>News Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    
   <div> 
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username"  name="user_name" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" name="login" href="login.php">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-newspaper-o"></i></i> News Admin</h1>
                  <p>©2016 All Rights Reserved. News Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Fullname" name="f_name" required=""/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="user_name" required=""/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required=""/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
              </div>
              <div>
                <input type="file" class="form-control" placeholder="image" name="user_image" required=""/>
              </div>
              <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active">
												</label>
											</div>
              <div>
                <a class="btn btn-default submit" href="" name="submit">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-newspaper-o"></i></i> News Admin</h1>
                  <p>©2016 All Rights Reserved. News Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
