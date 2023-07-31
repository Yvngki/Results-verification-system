<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="forms.css"> -->
    <title>Login</title>
 </head>
 <body>
 <header class="container-fluid bg-dark p-2" style="">
    <nav class="row"  style="">
            <div class="col-4">
                <a class="text-center btn btn-light" href="../index.php">
                    <i class="bi bi-house">Home</i>
                </a>
            </div>
        <div class="col-8"></div>
    </nav>
</header>

<div class="row">
    <div class="col-12 col-md-3 col-lg-3"></div>
    <div class="col-12 col-md-6 col-lg-6 p-4">
    <div class="container " style="padding:100px 0;">
        <div class="card text-dark shadow" style="">
        <div class="card-header text-light bg-dark">
            <div class="h3">Student Login</div>
        </div>

        <div class="card-body bg-light">
            <form method="POST" class="form "  action="../inc/login.inc.php">
                      <div class="text-center text-danger">
                        <?php
                        if(isset($_GET['id'])){
                            echo $_GET['id'];
                        }?>
                      </div>
                    <div class="form-group">
                        <label for="student_id">Student ID:</label>
                        <input type="text" required id="student_id" class="form-control" name="student_id">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" required class="form-control" id="password" name="password"> 
                    </div>
                <div class="card-footer">
                    <div class="row">
                            <div class="col-4">        
                                <a class="text-dark text-decoration-underline" href="studentreset.php">Forgot Password?</a>
                            </div>
                            <div class="col-4">
                                <div class="form-group text-center">
                                <input class="btn btn-primary w-100" type="submit" name="submit" value="Log in">
                                </div>
                            </div>
                            <div class="col-4">
                                <span>Dont have an account?</span>
                                <a class="text-dark text-decoration-underline" href="createAccount.php">Register!</a>
                            </div>
                    </div>
                </div>
                </form>
        </div>
        </div>
    </div>
</div>
    <div class="col-12 col-md-3 col-lg-3"></div>
</div>
   <script src="js/bootstrap.bundle.min.js"></script> 
 </body>
 </html>
     
      
        

          
                
      
     
         
     