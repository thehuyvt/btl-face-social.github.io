<?php 
    include "header.php";
    $notify = '';

?>
        <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                        <!-- <div class="container">
                            <p style="color:red;"><?php echo $notify ?></p>
                        </div> -->

                        <form action="" method="post" class="mx-1 mx-md-4">

                            <div class="d-flex flex-row align-items-center mb-4">
                                
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="userName">User Name</label>
                                <input type="text" id="userName" name= "userName" class="form-control" />
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="userEmail">Your Email</label>
                                <input type="email" id="userEmail" name = "userEmail" class="form-control" />
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="password_1">Password</label>
                                <input type="password" id="password_1" name = "password_1" class="form-control" />
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="password_2">Repeat your password</label>
                                <input type="password" id="password_2" name = "password_2" class="form-control" />
                                </div>
                            </div>

                            <!-- <div class="form-check d-flex justify-content-center mb-5">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c"
                                />
                                <label class="form-check-label" for="form2Example3">
                                I agree all statements in <a href="#!">Terms of service</a>
                                </label>
                            </div> -->

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" name ="sbmSignUp" class="btn btn-primary btn-lg">Sign Up</button>
                            </div>

                            <p class=" pb-lg-2" style="color: #6c757d;">You have an account! <a href="login.php" style="color: #0d6efd;" >Login here</a></p>

                        </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                        <img src="./img/signup.jpg" class="img-fluid" alt="Social network" style="border-radius: 1rem ; ">

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
<?php
    include 'config.php';
    if(isset($_POST['sbmSignUp'])){
        $user_name = $_POST['userName'];
        $email = $_POST['userEmail'];
        $pass1 = $_POST['password_1'];
        $pass2 = $_POST['password_2'];


        if($pass1 == $pass2){
            $sql = "SELECT * FROM users WHERE user_name = '$user_name' OR user_email = '$email'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                //header("Location:register.php");
                echo "Email hoặc Tên đăng nhập đã được sử dụng!";
            }else{
                $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

                $sql2 = "INSERT INTO users (user_name, user_email, user_pass) VALUES ('$user_name', '$email', '$pass_hash')";
                
                $result2 = mysqli_query($conn, $sql2);

                if($result2 == 1){
                    // include 'sendemail.php';
                    echo 'Success!';
                }else{
                    echo'Lỗi!';
                }
            }
        }else{
            $notify = "Mật khẩu không khớp!";
            //header("Location:register.php");
        }
        
    }
    
?>
<?php include "footer.php";?>