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
            $nic = substr($_POST["name"], 0, 3).rand(0,100);
            $name= $_POST["name"];
            $gender = $_POST["gender"];
            $dob = $_POST["dob"];
            $phone = $_POST["phone"];
            $ephone = $_POST["ephone"];
            $eco = $_POST["eco"];
            $relationship = $_POST["relationship"];
            $plan = $_POST["plan"];


            $stat = $conn->prepare("INSERT IGNORE INTO `members`(`plan`, `name`, `nic`, `gender`, `dob`, `phone`, `relationship`, `eco`, `ephone`) VALUES (?,?,?,?,?,?,?,?,?)");
            $stat->bind_param("sssssssss",$plan, $name, $nic, $gender, $dob, $phone,$relationship,$eco, $ephone);

            if ($stat->execute())
            {
                echo "
                <div class='alert alert-success' role='alert'>
                      Enregistrement reussi.
                </div>
                ";
                echo "<script>window.location.href='member.php?etat=1';</script>;";
            }
            else
            {
                echo "<script>window.location.href='member.php?etat=2';</script>;";
            }
            $stat->close();
        }
        ?>
        <a href="member.php" >
            <button class="btn btn-primary float-left">Retour</button>
        </a>
        <h3 class="text-center"> Membres</h3>

        <div class="panel-body">
            <form role="form" id="frmPlan" method="post" action="add_member.php">


                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nom</label>
                        <input type="text" class="form-control" id="pname" name="name" placeholder="Entrer le nom">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Date de naissance</label>
                        <input type="date" class="form-control" id="pname" name="dob" placeholder="Date de naissance">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Personne d'urgence</label>
                        <input type="text" class="form-control" id="ecp" name="eco" placeholder="Entrer le nom d'une personne d'urgence">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Etat civil</label>
                        <select class="form-control" id="gender" name="relationship" placeholder="Etat civil" required>
                            <option value="Marié">Marié</option>
                            <option value="Célibataire" selected>Célibataire</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Plan d'entrainement</label>
                            <select class="form-control" id="plan" name="plan" placeholder="Plan" required>
                                <option value="">Veillez choisir un plan d'entrainement</option>
                                <?php
                                $stmt1 = mysqli_query($conn, "SELECT * FROM plan order by pid desc ");

                                $counter1=1;

                                while ($row1 = mysqli_fetch_array($stmt1)) {
                                    # code...
                                    ?>
                                    <option value="<?php echo $row1['pid']; ?>"><?php echo $row1['planname']; ?> valid: <?php echo $row1['validity']; ?> prix: <?php echo $row1['amount']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <label>Contact</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Contact de la personne d'urgence</label>
                        <input type="text" class="form-control" id="ephone" name="ephone" placeholder="Contact">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Genre</label>
                            <select class="form-control" id="gender" name="gender" placeholder="Genre" required>
                                <option value="">Veillez choisir le genre</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                        </div>
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