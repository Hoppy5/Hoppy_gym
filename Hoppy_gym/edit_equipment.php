<?php
session_start();
error_reporting(0);
if (empty( $_SESSION['username'])){
    header("location:index.php");
}
else{
    global  $conn;
    include("db.php");


    if(isset($_POST['save']))
    {
        $name=$_POST['name'];
        $details=$_POST['details'];
        $quantity=$_POST['quantity'];

        mysqli_query($conn,"UPDATE eauipment SET name='$name', details='$details', quantity='$quantity' WHERE id = '".$_GET['eq']."'");
        echo "<script>window.location.href = 'equipment.php?etat=1'</script>";
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
                <a href="equipment.php">
                    <button class="btn btn-primary">Retour</button>
                </a>
                <h3 class="text-center">Modifier l'equipement</h3>


                <?php
                $stmt = mysqli_query($conn, "SELECT * FROM eauipment WHERE id = '".$_GET['eq']."'");

                $counter=1;

                while ($row = mysqli_fetch_array($stmt)) {
                    # code...
                    ?>
                    <form  role="form" id="frmPlan" method="post">

                        <div class="row">

                            <div class="form-group col-md-12" style="display: none;">
                                <label>Identification de l'equipement</label>
                                <input type="text" class="form-control" id="mno" name="id" placeholder="Identification de l'equipement" value="<?php echo $row['id'];?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Identification de l'equipement</label>
                                <input type="text" class="form-control" id="mno" name="name" placeholder="Identification de l'equipement" value="<?php echo $row['name'];?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Details</label>
                                <input type="text" class="form-control" id="validity" name="details" placeholder="Details" value="<?php echo $row['details'];?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Quantité</label>
                                <input type="number" class="form-control" id="amount" name="quantity" placeholder="Quantité" value="<?php echo $row['quantity'];?>">
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