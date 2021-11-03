<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include 'mheader.php';
?>
    <div class="container rounded bg-white w-50" style="border: 2px solid #ccc;margin-top:10%; box-shadow:0 0 10px rgba(0, 0, 0, 0.3);">
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center">Post Status</h4>
                </div>
                <form action="">
                    <label class="labels mb-3">Write caption here:</label>
                    <textarea name="postCaption" id="postCaption" class="form-control mb-3" rows="8" placeholder="What are you thinking..."></textarea>
                    <!-- <input type="text" rows="10" class="form-control mb-3" placeholder="What are you thinking..." name="postCaption"> -->
                    <label class="labels mb-3">Upload Image here:</label>
                    <input type="file" id="postImg" name="postImg">
                    <input type="submit" class="btn btn-primary row mt-4 container " style="margin-left:0;" value="Post" name = "sbmPost">
                    
                </form>
                <!-- <div class="row mt-2">
                    <div class="col-md-12 mb-3"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" value=""></div>
                    <div class="col-md-12 mb-3"><label class="labels">Email</label><input type="text" class="form-control" value="" placeholder="Email"></div>
                    <div class="col-md-12 mb-3"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                    <div class="col-md-12 mb-3"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                </div>
                <div class="mt-5 "><button class="btn btn-primary profile-button" type="button">Save Profile</button></div> -->
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include 'mfooter.php'?>