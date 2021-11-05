<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include 'mheader.php';
?>
    <div class="container rounded bg-white " style="border: 2px solid #ccc;margin-top:10%; box-shadow:0 0 10px rgba(0, 0, 0, 0.3);">
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
                
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include 'mfooter.php'?>