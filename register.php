<?php 
    include "header.php";

?>
        <section class="vh-100% mt-5" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                        <!-- <div class="container">
                            <p style="color:red;"><?php echo $error;?></p>
                        </div> -->

                        <form action="" method="post" class="mx-1 mx-md-4">

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

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name"> Name</label>
                                <input type="text" id="name" name= "name" class="form-control" />
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="dateOfBirth">Date Of Birth</label>
                                <input type="date" id="dateOfBirth" name= "dateOfBirth" class="form-control" />
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <input type="text" id="phoneNumber" name= "phoneNumber" class="form-control" />
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                                <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="address"> Address</label>
                                <input type="text" id="address" name= "address" class="form-control" />
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
        $email = $_POST['userEmail'];
        $pass1 = $_POST['password_1'];
        $pass2 = $_POST['password_2'];
        $name = $_POST['name'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];


        if($pass1 == $pass2){
            $sql = "SELECT * FROM users WHERE user_email = '$email'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                //header("Location:register.php");
                echo"Email đã được sử dụng!";
            }else{
                $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

                $sql2 = "INSERT INTO users (user_email, user_pass, name, date_of_birth, phone_number, address) VALUES ('$email', '$pass_hash', '$name', '$dateOfBirth', '$phoneNumber','$address')";
                
                $result2 = mysqli_query($conn, $sql2);
               
                if($result2 == 1){
                    // include 'sendemail.php';
                    echo 'Success! You can login your account!';
                }else{
                    echo'Lỗi!';
                }
            }
        }else{
             echo "Mật khẩu không khớp!";
            //header("Location:register.php");
        }
        
    }
    mysqli_close($conn);
    
?>
<?php include "footer.php";?>