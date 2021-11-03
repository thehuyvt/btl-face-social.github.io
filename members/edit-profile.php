<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include 'mheader.php';
?>
    <div class="container rounded bg-white" style="border: 2px solid #ccc;margin-top:5%; box-shadow:0 0 10px rgba(0, 0, 0, 0.3); ">
    <div class="row">
        <div class="col-md-6 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">Edogaru</span>
                <span class="text-black-50">edogaru@mail.com.my</span>
                <span> </span>
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
                            <input type="text"id="name" name="name"  class="form-control" placeholder="Name" >
                        </div>
                        <div class="col-md-12 mb-3">
                            <label id="name" name="name" class="labels">Date of birth</label>
                            <input type="date"id="name" name="name"  class="form-control" placeholder="Name" >
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels" name="email" >Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels" name="phoneNumber" >Phone Number</label>
                            <input type="text" class="form-control" name="phoneNumber"  placeholder="Enter phone number" >
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels" name="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter your address" >
                        </div>
                    </div>
                    <div class="mt-5 ">
                        <input type="submit" name="sbmSave" class="btn btn-primary profile-button" value="Save Profile">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include 'mfooter.php'?>