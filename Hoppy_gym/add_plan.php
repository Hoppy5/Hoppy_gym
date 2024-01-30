
<?php
session_start();
error_reporting(0);
global $conn;
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{

    include("db.php");

    if ( $conn -> connect_error )
    {
        die("Connexion failed:" . $conn->connect_error);
    }
    if (isset($_POST['save']))
    {
        $planname = $_POST["planname"];
        $validity= $_POST["validity"];
        $amount = $_POST["amount"];

        $stat = $conn->prepare("INSERT IGNORE INTO plan (planname,validity,amount) VALUES (?,?,?)");
        $stat->bind_param("sss",$planname,$validity,$amount);

        if ($stat->execute())
        {
            echo "<script>window.location.href='plan.php?etat=1';</script>;";
        }
        else
        {
            echo "<script>window.location.href='plan.php?etat=2';</script>;";
        }
        $stat->close();
    }
    ?>

    <html>
    <?php include_once "head.php"; ?>

    <body>
    <?php include("header.php"); ?>

    <div class="px-4 mt-3">





                <h3 class="text-center">Ajouter un plan d'entrainement</h3>
                <p id="hidden">
                    <a href="plan.php">
                        <button class="btn btn-primary">Retour</button>
                    </a>
                </p>
                <form role="form" id="frmPlan" method="post" action="add_plan.php">

                    <div class="row">

                        <div class="form-group col-md-12">
                            <label>Identification du plan</label>
                            <input type="text" class="form-control" id="mno" name="planname" placeholder="Identification du plan" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Validité (mois)</label>
                            <input type="number" class="form-control" id="validity" name="validity" placeholder="validité">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Prix ($)</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Prix">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="float-left">
                                <button type="submit" name="save" class="btn btn-primary mb-2"> Enregistrer</button>
                            </div>
                        </div>

                    </div>

                </form>

    </div>




    </body>

    </html>
<?php } ?>
