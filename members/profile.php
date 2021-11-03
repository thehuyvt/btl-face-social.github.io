<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include 'mheader.php';
?>
    <div class="container rounded bg-white " style="border: 2px solid #ccc; margin-top:8%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
    <div class="row">
        <div class="col-md-6 border-right" >
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">Edogaru</span>
                <span class="text-black-50">edogaru@mail.com.my</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-6 border-right " style=" padding:50px;">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Your Profile:</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels ">Name: <label for="name" name="name">HUY</label></label><br>
                        <label class="labels mt-3">Date of birth: <label for="name" name="name">HUY</label></label><br>
                        <label class="labels mt-3">Email: <label for="email" name="email">HUY@gmail.com</label></label><br>
                        <label class="labels mt-3">Mobile Number: <label for="phoneNumber" name="phoneNumber">0123456789</label></label><br>
                        <label class="labels mt-3">Address: <label for="address" name="address">Vinh Phuc</label></label><br>
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