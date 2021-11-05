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
    $post_id = $_GET['post_id'];
    $sql2 = "SELECT * FROM posts WHERE post_id='$post_id'";
    $result2=mysqli_query($conn, $sql2);
    
    if(mysqli_num_rows($result2)){
        $row = mysqli_fetch_assoc($result2);
        $id = $row['user_id'];
        $post_cap = $row['post_cap'];
        $post_img = $row['post_img'];
    }
    if($user_id != $id){
        header("Location:index.php");
    }
    include 'mheader.php';
?>
    <div class="container rounded bg-white edit-post" style="border: 2px solid #ccc;margin-top:10%; box-shadow:0 0 10px rgba(0, 0, 0, 0.3);">
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center">Post Status</h4>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <label class="labels mb-3">Write caption here:</label>
                    <textarea name="ncaption" id="ncaption" class="form-control mb-3" rows="8"></textarea>
                    <label class="labels mb-3">Upload Image here:</label>
                    <input type="file" id="npostImg" name="npostImg" >
                    <?php echo "<img src='../uploads/".$post_img."'class='form-control editpost-img mb-3' alt='image' style='box-shadow: 0 0 4px rgba(0,0,0,0.2);''>";?>
                    <input type="submit" name = "sbmUpdate" class="btn btn-primary row mt-4 container" style="margin-left:0;" value="Update" >
                </form>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    document.getElementById("ncaption").value = "<?php echo $post_cap; ?>";
</script>
<?php
    if(isset($_POST['sbmUpdate'])){
        $new_cap = $_POST['ncaption'];
        $new_img = basename($_FILES['npostImg']['name']);


        //upload img
        $target_dir = "../uploads/";
        $target_file = $target_dir . $new_img;

        if (move_uploaded_file($_FILES["npostImg"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars($new_img). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        $sql3 = "UPDATE posts SET post_cap='$new_cap', post_img='$new_img' WHERE post_id = '$post_id'";
        $result3 = mysqli_query($conn,$sql3);

        if($result3 > 0){
            header("Location:index.php");
            
        }else{
            echo 'Sửa bản ghi thất bại!';
        }
    }
    mysqli_close($conn);
?>
<?php include 'mfooter.php'?>