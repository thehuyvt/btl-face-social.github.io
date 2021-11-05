<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include 'aheader.php'; 
?>
    <main style="margin-top:5rem;">
        <!-- Hiển thị BẢNG DỮ LIỆU DANH BẠ CÁ NHÂN -->
        <!-- Kết nối tới Sever, truy vấn dữ liệu (SELECT) từ bảng db-employees -->
        <!-- Quy trình 4 bước -->
        <a href="../logout.php"class="btn btn-primary m-3">Sign out</a>
        <table class="table text-center">
            <thead>
                <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Regist Date</th>
                <th scope="col">Avatar</th>
                <th scope="col">Edit User</th>
                <th scope="col">Delete User</th>
                </tr>
            </thead>
            <tbody>
                <!-- thay đổi theo csdl -->
                <?php 
                //1. Kết nối CSDL
                    include '../config.php';
                    
                //2. Thực hiện truy vấn
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);//lưu kết quả trả về vào result
                //3. Phân tích và xử lý dữ liệu
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                                echo '<td>'.$row['user_id'].'</td>';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['user_email'].'</td>';
                                echo '<td>'.$row['user_regis_date'].'</td>';
                                echo '<td>'."<img src='../uploads/".$row['avatar']."' width='50px'  alt='avatar'style='display:inline-block; border-radius:50%;margin-right:16px; max-height: 50px; box-shadow: 0 0 4px rgba(0,0,0,0.2);'>".'</td>';
                                echo '<td><a href="edit-user.php?id='.$row['user_id'].'" class="text-primary"><i class="fas fa-user-edit"></i></a></td>';
                                echo '<td><a href="delete-user.php?id='.$row['user_id'].'" class="text-primary"><i class="fas fa-user-times"></i></i></a></td>';
                            echo '</tr>';
                        }
                    }
                //4. Đóng kết nối
                    mysqli_close($conn);
                ?>
                <!-- thay đổi theo csdl -->
            </tbody>
        </table>
    </main>
<?php include 'afooter.php';?>