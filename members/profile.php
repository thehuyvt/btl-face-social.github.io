<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }else{
        $email = $_SESSION['loginSuccess'];
        include "../config.php";
        $sql = "SELECT * FROM users WHERE user_email = '$email'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            $avatar = $row['avatar'];
            $id = $row['user_id'];
            $name = $row['name'];
            $date_of_birth = $row['date_of_birth'];
            $phone_number = $row['phone_number'];
            $address = $row['address'];
        }
        
    }
    include 'mheader.php';
?>
    <div class="container rounded bg-white " style="border: 2px solid #ccc; margin-top:8%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
    <div class="row">
        <div class="col-md-6 border-right" >
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php echo"<img class='rounded-circle mt-5' width='150px' src='../uploads/".$avatar."'>"; ?>
                <span class="font-weight-bold"><?php echo $name?></span>
                <span class="text-black-50"><?php echo $email?></span>
                <span></span>
            </div>
        </div>
        <div class="col-md-6 border-right " style=" padding:50px;">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Your Profile:</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels ">Name: <label for="name" name="name"><?php echo $name?></label></label><br>
                        <label class="labels mt-3">Date of birth: <label for="name" name="name"><?php echo $date_of_birth?></label></label><br>
                        <label class="labels mt-3">Email: <label for="email" name="email"><?php echo $email?></label></label><br>
                        <label class="labels mt-3">Mobile Number: <label for="phoneNumber" name="phoneNumber"><?php echo $phone_number?></label></label><br>
                        <label class="labels mt-3">Address: <label for="address" name="address"><?php echo $address?></label></label><br>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="edit-profile.php">
                        <button class="btn btn-primary profile-button" type="button">Edit Profile</button></div>
                    </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include 'mfooter.php'?>