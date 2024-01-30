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

        if (isset($_POST['save']))
        {
            $name= $_POST["name"];
            $details = $_POST["details"];
            $quantity = $_POST["quantity"];

            $stat = $conn->prepare("INSERT IGNORE INTO `eauipment`(`name`, `quantity`, `details`) VALUES (?,?,?)");
            $stat->bind_param("sss",$name, $quantity, $details);

            if ($stat->execute())
            {
                echo "
                <div class='alert alert-success' role='alert'>
                      Enregistrement reussi.
                </div>
                ";
                echo "<script>window.location.href='equipment.php?etat=1';</script>;";
            }
            else
            {
                echo "<script>window.location.href='equipment.php?etat=2';</script>;";
            }
            $stat->close();
        }
        ?>
        <a href="equipment.php" >
            <button class="btn btn-primary float-left">Retour</button>
        </a>
        <h3 class="text-center"> Nouvel equipement</h3>

        <div class="panel-body">
            <form role="form" id="frmPlan" method="post" action="add_equipment.php">


                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nom de l'equipement</label>
                        <input type="text" class="form-control" id="pname" name="name" placeholder="Entrer le nom de l'equipement">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Details</label>
                        <input type="text" class="form-control" id="pname" name="details" placeholder="Details">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Quantité</label>
                        <input type="text" class="form-control" id="pname" name="quantity" placeholder="Details">
                    </div>

                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="save" class="btn btn-primary mb-2"> Enregistrer</button>
                    </div>

                </div>



            </form>
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