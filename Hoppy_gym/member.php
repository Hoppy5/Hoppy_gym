<?php
session_start();
error_reporting(0);
global $conn;
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{
    include_once("db.php");

    ?>

<html>
<?php include_once "head.php"; ?>

<body>
<?php include("header.php"); ?>

<div class="col-sm-12 mt-5">
    <?php
    if ($_GET['etat']==1){
        echo "
                <div class='alert alert-success' role='alert'>
                      Enregistrement reussi.
                </div>
                ";
    }
    else if ($_GET['etat']==2){
        echo "
                <div class='alert alert-danger' role='alert'>
                      Echec d'enregistrement.
                </div>
                ";
    }
    ?>
    <a href="add_member.php" >
        <button class="btn btn-primary float-left">Ajouter membre</button>
    </a>
    <h3 class="text-center"> Membres</h3>

    <div class="panel-body">

    <table id="tbl-projects" class="table table-bordered mt-3" cellspacing="0"
           width="100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Matricule</th>
                <th>Genre</th>
                <th>Date</th>
                <th id="hidden">#</th>
              
            </tr>

        </thead>
        <tbody id="myTable">


        <?php 
            $stmt = mysqli_query($conn, "SELECT members.*, plan.* FROM members, plan WHERE members.plan=plan.pid");
            
            $counter=1;

            while ($row = mysqli_fetch_array($stmt)) {
                # code...
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['nic']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['joindate']; ?></td>

                    <td id="hidden">

                        <a href="invoice.php?member=<?php echo $row['id']; ?>">
                            <button class="btn btn-primary btn-sm mb-2 mt-2" > Facturation</button>
                        </a>
                    </td>
                </tr>
                <?php
                $counter++;
            }
                

        ?>
            
        </tbody>

     
    </table>
</div>
</div>
</div>

<script src="bootstrap/jquery/dist/jquery.min.js"></script>
<!-- FastClick-->

<script src="bootstrap/jquery.validate.min.js"></script>

<!-- slimscroll-->
<script src="bootstrap/jquery.validate.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>



</body>

</html>

<?php } ?>