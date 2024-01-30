<?php
session_start();
error_reporting(0);
global $conn;
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{

include("db.php");
    if(isset($_GET['delete']))
    {
        $id=$_GET['mark_done'];
        mysqli_query($conn,"delete from `plan` where pid = '".$_GET['delete']."'");
        echo "<script>window.location.href = 'plan.php?etat=3'</script>";
    }
    ?>

<html>
<?php include_once "head.php"; ?>

<body>
<?php include("header.php"); ?>

<br><br>
<div class="px-4">
    <div class="row">

        <!-- table -->
        <div class="col-md-12">
            <?php
            if ($_GET['etat']==1){
                echo "
                <div class='alert alert-success' role='alert' id='hidden'>
                      Enregistrement reussi.
                </div>
                ";
            }
            else if ($_GET['etat']==2){
                echo "
                <div class='alert alert-danger' role='alert' id='hidden'>
                      Echec d'enregistrement.
                </div>
                ";
            }
            else if ($_GET['etat']==3){
                echo "
                <div class='alert alert-dark' role='alert' id='hidden'>
                      Suppression reussie.
                </div>
                ";
            }
            ?>
            <h3 class="text-center"> Plans d'entrainement</h3>
            <p id="hidden">
                <a href="add_plan.php">
                    <button class="btn btn-primary">Ajouter un plan</button>
                </a>
                <button class="btn btn-dark" onclick="window.print()">Imprimer</button>
            </p>
        <table id="tbl-projects" class="table table-bordered mt-3" cellspacing="0"
           width="100%">
        <thead>
            <tr>
                <th>Identification</th>
                <th>Validité</th>
                <th>Prix</th>
                <th id="hidden">#</th>
              
            </tr>

        </thead>
        <tbody id="myTable">


        <?php 
            $stmt = mysqli_query($conn, "SELECT * FROM plan WHERE 1");
            
            $counter=1;

            while ($row = mysqli_fetch_array($stmt)) {
                # code...
                ?>
                <tr>
                    <td><?php echo $row['planname']; ?></td>
                    <td><?php echo $row['validity']." mois"; ?></td>
                    <td><?php echo $row['amount']." $"; ?></td>
                    <td id="hidden">
                        <a href="edit_plan.php?plan=<?php echo $row['pid'];?>">
                            <button class="btn btn-success btn-sm mb-2 mt-2" >Modifier</button>
                        </a>

                        <a href="plan.php?delete=<?php echo $row['pid'];?>">
                            <button class="btn btn-danger btn-sm mb-2 mt-2" onclick="confirm('Voulez-vous supprimer ce plan?')">Supprimer</button>
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



</body>

</html>
<?php } ?>