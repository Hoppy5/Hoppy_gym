<?php
session_start();
error_reporting(0);
global $conn;
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{
    include_once("db.php");

    if(isset($_GET['delete']))
    {
        mysqli_query($conn,"delete from `eauipment` where id = '".$_GET['delete']."'");
        echo "<script>window.location.href = 'equipment.php?etat=3'</script>";
    }

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
        else if ($_GET['etat']==3){
            echo "
                <div class='alert alert-dark' role='alert'>
                      Suppression reussie.
                </div>
                ";
        }
        ?>
        <a href="add_equipment.php" >
            <button class="btn btn-primary float-left">Ajouter equipement</button>
        </a>
        <h3 class="text-center"> Equipement</h3>

        <div class="panel-body">

            <table id="tbl-projects" class="table table-bordered mt-3" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Details</th>
                    <th>Quantité</th>
                    <th id="hidden">#</th>

                </tr>

                </thead>
                <tbody id="myTable">


                <?php
                $stmt = mysqli_query($conn, "SELECT * FROM eauipment");
                $counter=1;

                while ($row = mysqli_fetch_array($stmt)) {
                    # code...
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['details']; ?></td>
                        <td><?php echo $row['quantity']." pcs"; ?></td>

                        <td id="hidden">
                            <a href="edit_equipment.php?eq=<?php echo $row['id'];?>">
                                <button class="btn btn-success btn-sm mb-2 mt-2" >Modifier</button>
                            </a>

                            <a href="equipment.php?delete=<?php echo $row['id'];?>">
                                <button class="btn btn-danger btn-sm mb-2 mt-2" onclick="confirm('Voulez-vous supprimer cet equipement?')">Supprimer</button>
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