<?php
session_start();
error_reporting(0);
global $conn;
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{
 include("db.php");


  ?>

<html>
<?php include_once "head.php"; ?>

<style type="text/css">
    tr th, td{

    }
</style>
<body>
<?php include("header.php"); ?>

<br><br>
<div class="container">
    <div class="row">


  




        <!-- table -->
        <div class="col-md-2"></div>
        <div class="col-md-8 card px-3 py-3 shadow " style="">
            
            <button class="btn btn-dark float-left" id="hidden" onclick="window.print()" style="width: 90px;font-size: 90%;">  Imprimer</button>

            <h3 class="text-center mt-2">FACTURE : HOPPY-GYM</h3>
            <?php
            $id=$_GET['member'];

            $stmt = mysqli_query($conn, "SELECT members.*, plan.* FROM members, plan WHERE members.plan=plan.pid and id=$id and status=0");
            
            $counter=1;

            while ($row = mysqli_fetch_array($stmt)) {
                # code...
                ?>
        <table id="tbl-projects" class="table table-bordered mt-3" cellspacing="0" 
           width="70%" style="border:solid black 1px;">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-uppercase text-danger"><?php echo $row['name']; ?></th>
            </tr>

            <tr>
                <th>Matricule</th>
                <th class="text-uppercase text-danger"><?php echo $row['nic']; ?></th>
            </tr>

            <tr>
                <th>Genre</th>
                <th class="text-uppercase text-danger"><?php echo $row['gender']; ?></th>
            </tr>

            <tr>
                <th>Plan d'entrainement</th>
                <th class="text-danger"><?php echo $row['planname']; ?></th>
            </tr>

            <tr>
                <th>Validité</th>
                <th class="text-danger"><?php echo $row['validity']; ?> Month(s)</th>
            </tr>

            <tr>
                <th style="font-weight:bolder; font-size: 20px;">Prix</th>
                <th class="text-uppercase text-danger" style="font-weight:bolder; font-size: 20px;"><?php echo $row['amount']." $"; ?></th>
            </tr>

        </thead>
        

     
    </table>

<?php } ?>
        </div>
    </div>











</div>

</body>

</html>

<?php } ?>
