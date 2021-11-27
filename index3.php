<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP page 3</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.1/sweetalert2.min.css" integrity="sha512-OkYLbkJ4DB7ewvcpNLF9DSFmhdmxFXQ1Cs+XyjMsMMC94LynFJaA9cPXOokugkmZo6O6lwZg+V5dwQMH4S5/3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.1/sweetalert2.min.js" integrity="sha512-qsog2Un5vHgtBLsgIIcZcfcRNxUXAswH2TxciIVDcB/reXRm1hFyH5Eb1ubQDUK149uK2HzuC0HFcqtSY5F1gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <?php
            if(isset($_GET['submit'])){
                //echo'yes';
                //1.connection open
                $con = @mysqli_connect('localhost','root','','k_db') or die('could not connect');

                //defind the variable
                $name = mysqli_real_escape_string($con,$_GET['name']);
                $email = mysqli_real_escape_string($con,$_GET['email']);
                $password = mysqli_real_escape_string($con,$_GET['password']);
                $confi_password = mysqli_real_escape_string($con,$_GET['confi_password']);

                //check the password and confirm pasword
                if($password == $confi_password){
                    //create a salt
                    //mt-microtime
                    $salt = mt_rand(10,1000);
                    echo $salt;

                    echo'<br>';

                   echo  $hash_password = hash('sha512',$password);

                   echo'<br>';

                   echo  $hash_password = hash('sha512',$salt.$salt.$hash_password,$salt.$salt);

                   // hashing algorithm with salt using then very compect password 

                    //2.build the query
                    $query = "INSERT INTO user1_tbl(`name`,`email`,`password`) VALUES('$name','$email','$hash_password')";

                    //3. execute the query
                    mysqli_query($con,$query);

                    //4.display the result
                    echo "<script>
                                Swal.fire({position: 'center-center',icon: 'success',title: 'Data Inserted successfully',showConfirmButton: false,timer: 1500})
                        </script>";
                
                }
                else{
                    echo "<script>
                            Swal.fire({position: 'center-center',icon: 'error',title: 'Password and confirm password not match',showConfirmButton: false,timer: 1500})
                        </script>";   
                }
                //5.connection close
                mysqli_close($con);

                }
                
        /*
        else {
            echo'no';
        } */
            
        ?>
            
        <form>
            <div class="row w-50 offset-3 mt-5">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" requried>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-lab  el">Email</label>
                    <input type="email" name="email" class="form-control" id="email" requried>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" requried>
                </div>
                <div class="mb-3">
                    <label for="confi_password" class="form-label">Confirm password</label>
                    <input type="password" name="confi_password" class="form-control" id="confi_password" requried>
                </div>
                 <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox" value="checkbox" requried>
                    <label class="form-check-label" for="checkbox">Check me out</label>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="submit">
            </div>
            
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>

        </script>    
</body>
</html>