<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include '../config.php';
    $email = $_SESSION['loginSuccess'];
    $sql = "SELECT * FROM users WHERE user_email = '$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
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
                <form action="" method="post" enctype="multipart/form-data">
                    <label class="labels mb-3">Write caption here:</label>
                    <textarea name="caption" id="caption" class="form-control mb-3" rows="8" placeholder="What are you thinking..."></textarea>
                    <label class="labels mb-3">Upload Image here:</label>
                    <input type="file" id="postImg" name="postImg">
                    <input type="submit" name = "sbmPost" class="btn btn-primary row mt-4 container " style="margin-left:0;" value="Post" >
                </form>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
   
    if(isset($_POST['sbmPost'])){
        $caption = $_POST['caption'];
        $post_img = basename($_FILES['postImg']['name']);
        
        //upload img
        $target_dir = "../uploads/";
        $target_file = $target_dir . $post_img;

        if (move_uploaded_file($_FILES["postImg"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars($post_img). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $sql2 = "INSERT INTO posts(post_cap, post_img, user_id) VALUES ('$caption', '$post_img', '$user_id')";
        $result2 = mysqli_query($conn, $sql2);

        if($result2 > 0){
            header("Location:index.php");
        }else{
            echo "Erorr! Status upload failed!";
        }
        
    }

    mysqli_close($conn);
    
?>

<?php include 'mfooter.php'?>