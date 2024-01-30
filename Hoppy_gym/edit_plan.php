<?php
session_start();
error_reporting(0);
global $conn;
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{
    include("db.php");


    if(isset($_POST['save']))
    {
        $plan=$_POST['plan'];
        $validity=$_POST['validity'];
        $amount=$_POST['amount'];
        $pid=$_POST['pid'];

        mysqli_query($conn,"UPDATE plan SET planname='$plan', validity=$validity, amount=$amount WHERE pid = '".$_GET['plan']."'");
        echo "<script>window.location.href = 'plan.php?etat=1'</script>";
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
                <a href="plan.php">
                    <button class="btn btn-primary">Retour</button>
                </a>
                <h3 class="text-center">Modifier le plan</h3>


    <?php
    $stmt = mysqli_query($conn, "SELECT * FROM plan WHERE pid = '".$_GET['plan']."'");

    $counter=1;

    while ($row = mysqli_fetch_array($stmt)) {
        # code...
        ?>
                <form  role="form" id="frmPlan" method="post">

                    <div class="row">

                        <div class="form-group col-md-12" style="display: none;">
                            <label>Identification du plan</label>
                            <input type="text" class="form-control" id="mno" name="pid" placeholder="Identification du plan" value="<?php echo $row['pid'];?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Identification du plan</label>
                            <input type="text" class="form-control" id="mno" name="plan" placeholder="Identification du plan" value="<?php echo $row['planname'];?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Validité (mois)</label>
                            <input type="number" class="form-control" id="validity" name="validity" placeholder="validité" value="<?php echo $row['validity'];?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Prix ($)</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Prix" value="<?php echo $row['amount'];?>">
                        </div>
                    </div>
                    <br>


                            <div class="float-left">
                                <button type="submit" name="save" class="btn btn-primary mb-2"> Enregistrer</button>
                            </div>


                </form>

        <?php
        }
        ?>
            </div>
        </div>

    </div>



    </body>

    </html>
<?php } ?>