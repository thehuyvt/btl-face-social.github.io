<?php
ob_start();
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }else{
        include "../config.php";
        $email = $_SESSION['loginSuccess'];
        $sql = "SELECT * FROM users WHERE user_email='$email'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            $id = $row['user_id'];
            $name = $row['name'];
            $date_of_birth = $row['date_of_birth'];
            $phone_number = $row['phone_number'];
            $address = $row['address'];
        }
    }
    include 'mheader.php';
?>
    <div class="container rounded bg-white" style="border: 2px solid #ccc;margin-top:8%; box-shadow:0 0 10px rgba(0, 0, 0, 0.3); ">
    <div class="row">
        <div class="col-md-6 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?php echo $name ?></span>
                <span class="text-black-50"><?php echo $email ?></span>
                <span></span>
            </div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <form action="" method="post">
                    <div class="row mt-2">
                        <div class="col-md-12 mb-3">
                            <label id="name" name="name" class="labels">Name</label>
                            <input type="text"id="name" name="name"  class="form-control" placeholder="Name" value="<?php echo $name; ?>"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label name="dateOfBirth" class="labels">Date of birth</label>
                            <input type="date" id="dateOfBirth" name= "dateOfBirth" class="form-control" value="<?php echo $date_of_birth; ?>"/>
                            
                            <!-- <input type="date"id="dateOfBirth" name="dateOfBirth"  class="form-control"  > -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels" name="email" >Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels" name="phoneNumber" >Phone Number</label>
                            <input type="text" class="form-control" name="phoneNumber"  placeholder="Enter phone number" value="<?php echo $phone_number; ?>"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels" name="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter your address" value="<?php echo $address; ?>"/>
                        </div>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="sbmSave" class="btn btn-primary profile-button" value="Save Profile"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
    
    if(isset($_POST['sbmSave'])){
        $uname = $_POST['name'];
        $udate_of_birth = $_POST['dateOfBirth'];
        $uemail = $_POST['email'];
        $uphone_number= $_POST['phoneNumber'];
        $uaddress = $_POST['address'];

        $sql2 = "UPDATE users SET name = '$uname', date_of_birth = '$udate_of_birth', user_email='$uemail', phone_number ='$uphone_number', address ='$uaddress' WHERE user_id='$id' AND user_email='$email'";

        $result2 = mysqli_query($conn, $sql2);

        if($result2>0){
            header("Location:profile.php");
            ob_end_flush();
        }else{
            echo 'Sửa bản ghi thất bại!';
        }
    }
?>
<?php include 'mfooter.php'?>