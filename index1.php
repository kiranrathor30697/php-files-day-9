<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Page 2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php 

         

         //if check the incomming data
         if(isset($_GET['submit'])){
            //echo "ok";

            //1.connection open
            $con = mysqli_connect('localhost','root','','k_db'); 
             //echo "ok";

            
            //filter and senitize the incomming data

            $fname = mysqli_real_escape_string($con,$_GET['fname']);
            $lname = mysqli_real_escape_string($con,$_GET['lname']);
            $dob = mysqli_real_escape_string($con,$_GET['dob']);
            $mob = mysqli_real_escape_string($con,$_GET['mob']);
            $user_name = mysqli_real_escape_string($con,$_GET['user_name']);
            $email = mysqli_real_escape_string($con,$_GET['email']);
            $password =mysqli_real_escape_string($con,$_GET['password']);
            $confi_password = mysqli_real_escape_string($con,$_GET['confi_password']);

            if($password == $confi_password){

                $password =  hash('sha512',$password);
                //echo "ok";

                //2. build the query
                $query = "INSERT INTO user_tbl(`fname`,`lname`,`dob`,`mob`,`user_name`,`email`,`password`) VALUES('$fname','$lname','$dob','$mob','$user_name','$email','$password')";
            
                //3. execute the query 
                mysqli_query($con,$query);
                
                //4.display the result
                echo '<script>swal("Data Inserted successfully!", "Data Inserted successfully!", "success");</script>';
                /* header('Location:'.$_SERVER['PHP_SELF'].'?new user ragister'); */
            }
            else{
                //echo "not match";
                echo '<script>swal("Password or confirm password not match!", "Password or confirm password not match!", "error");</script>';
            }
        
            //5.connection close
            mysqli_close($con);
            //echo "okok";
           
        }  
         /* 
            else{
                echo "not ok";
            } */     

        ?>
        <form class=" w-50 offset-3 mt-5" action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
            <div>
            <h1 class="text-center">Ragistrattion Form<h1>
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" id="fname" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" id="lname" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" required>
            </div>
            <div class="mb-3">
                <label for="mob" class="form-label">Mobile Number</label>
                <input type="number" name="mob" class="form-control" id="mob" required>
            </div>
            <div class="mb-3">
                <label for=user_name class="form-label">User Name</label>
                <input type="text" name="user_name" class="form-control" id="user_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="confi_password" class="form-label">Confirm Password</label>
                <input type=password name="confi_password" class="form-control" id="confi_password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox" value="checkbox" required>
                <label class="form-check-label" for="checkbox">Check me out</label>
            </div>  
            <button type="submit" name="submit" class="btn btn-primary" value="submit">Submit</button>
        </form>

        <!-- swal("Good job!", "You clicked the button!", "success"); -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>