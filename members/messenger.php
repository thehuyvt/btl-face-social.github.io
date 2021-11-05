<?php 
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include 'mheader.php'; 
?>
    <section class="vh-100 " style="background-color: #f0f2f5;">
        <div class="container py-5 h-100 mess-content">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card p-3" style="border-radius: 1rem;">
                <div class="row g-0  text-center">
                    <h3 class=" mb-3 pb-3 text-primary" style="letter-spacing: 1px;  font-weight: 700;">Notify! The system is maintenance...</h3>
                    <img src="../img/baotri.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem; "/>
                    <div class="col-12 mt-4">
                        <a href="index.php"><button type="submit" class="btn btn-primary btn-lg btn-block "style="width:60%;">Home</button></a>
                        <hr style="height:3px;border-width:0;color:gray;background-color:gray">
                        <a href="../logout.php"><button type="submit" class="btn btn-primary btn-lg btn-block"style="width:60%;">Sign out</button></a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
<?php include 'mfooter.php';?>