

<?php
session_start();
error_reporting(0);
global $conn;
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{
include("db.php"); ?>
<html lang="en" dir="ltr">
<?php include_once "head.php"; ?>

<body style="background-image:url('images/rendu-3d-salle-gym-fitness-loft-moderne.jpg');background-size:cover; background-repeat: no-repeat;">
<?php include("header.php"); ?>
<br><br>


<div class="container-fluid px-5 py-3">
    <div class="row px-3 py-4" >
        <div class="col-md-4 " >
            <div class="row px-3 py-3">
                <div class="col-md-12 bg-dark card shadow" style="height: auto;opacity: 0.6;">
                    <?php 
            $stmt = mysqli_query($conn, "SELECT count(id) as count FROM members");
            
            while ($row = mysqli_fetch_array($stmt)) {
                # code...
                ?>
                <h4 class="text-center text-white">Membres</h4>
                <hr>
                <span style="font-weight:bolder;font-size: 40px;color:whitesmoke;"><?php echo $row['count']; ?></span>
                <?php 
            }
            ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 " >
            <div class="row px-3 py-3">
                <div class="col-md-12 bg-dark card shadow" style="height: auto;opacity: 0.6;">
                    <?php 
            $stmt = mysqli_query($conn, "SELECT count(pid) as count_pid FROM plan");
            
            while ($row = mysqli_fetch_array($stmt)) {
                # code...
                ?>
                <h4 class="text-center text-white">Plan d'entrainement</h4>
                <hr>
                <span style="font-weight:bolder;font-size: 40px;color:whitesmoke;"><?php echo $row['count_pid']; ?></span>
                <?php 
            }
            ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 " >
            <div class="row px-3 py-3">
                <div class="col-md-12 bg-dark card shadow" style="height: auto;opacity: 0.6;">
                    <?php 
            $stmt = mysqli_query($conn, "SELECT count(id) as count_users FROM users");
            
            while ($row = mysqli_fetch_array($stmt)) {
                # code...
                ?>
                <h4 class="text-center text-white">Utilisateurs</h4>
                <hr>
                <span style="font-weight:bolder;font-size: 40px;color:whitesmoke;"><?php echo $row['count_users']; ?></span>
                <?php 
            }
            ?>
                </div>
            </div>
        </div>

        


    </div>



</body>


</html>
<?php
}
?>