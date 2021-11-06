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
        $user_name = $row['name'];
    }
    include 'mheader.php';
?>
    <div class="container-fluid content" style=" margin-top:46px; background: #f0f2f5; padding-top:24px; padding-bottom:24px;">
        <?php
            echo "<h3 class='mb-5'>Welcome ".$user_name." to Face-Social!</h3>";
            
            $sql2 = "SELECT u.user_id, u.name, u.avatar, p.post_cap, p.post_img, p.post_id FROM posts p, users u WHERE p.user_id = u.user_id";
            $result2 = mysqli_query($conn, $sql2);

            if(mysqli_num_rows($result2)>0){
                while($row2 = mysqli_fetch_assoc($result2)){
                    $name = $row2['name'];
                    $avatar = $row2['avatar'];
                    $caption = $row2['post_cap'];
                    $img = $row2['post_img'];
                    $post_id = $row2['post_id'];


                    echo "<div class='container col-12 mcontent' style='background-color:#fff; border-radius:0.5rem; padding: 20px; margin-bottom:16px;box-shadow: 0 0 3px rgba(0,0,0,0.4);'>";
                        echo "<div class='infor_user' style='margin-left:0; font-weight:600; margin-bottom:16px;'>";
                            echo"<img src='../uploads/".$avatar."' width='50px'  alt='avatar'style='display:inline-block; border-radius:50%;margin-right:16px; max-height: 50px; box-shadow: 0 0 4px rgba(0,0,0,0.2);'>".$name."";
                        echo " </div>";
                        echo "<div class='row col col-12' style='margin-left:0; '>";
                            echo " <h6 style='font-weight: 400;'>".$caption."</h6>";
                        echo "</div>";
                        echo"<div class='row' style='margin-left:0; margin-right:0;'>";
                            echo "<img src='../uploads/".$img."' alt='image' style='box-shadow: 0 0 4px rgba(0,0,0,0.2);''>";
                        echo"</div>";
                        echo"<hr style='height:2px; border-width:0; color:gray; background-color:gray'>";
                        echo"<div class='row text-center'>";
                            echo"<div class='col-3'style='color:#000; text-decoration: underline;'>like</div>";
                            echo"<div class='col-3'style='color:#000; text-decoration: underline;'>comment</div>";
                            echo"<div class='col-3'>";
                                echo"<a href='edit-posts.php?post_id=".$post_id."' style='color:#000;'>edit</a>";
                            echo"</div>";
                            echo"<div class='col-3'>";
                                echo"<a href='delete-posts.php?post_id=".$post_id."' style='color:#000;'>delete</a>";
                            echo"</div>";
                        echo"</div>";
                    echo"</div>";
        }
            }
            mysqli_close($conn);
        ?>
        
    </div>
<?php include 'mfooter.php' ?>