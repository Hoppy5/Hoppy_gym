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
            $username= $_POST["username"];
            $email = $_POST["email"];
            $password = md5($_POST["password"]);


            $stat = $conn->prepare("INSERT IGNORE INTO `users`(`username`, `email`, `password`) VALUES (?,?,?)");
            $stat->bind_param("sss",$username, $email, $password);

            if ($stat->execute())
            {
                echo "
                <div class='alert alert-success' role='alert'>
                      Enregistrement reussi.
                </div>
                ";
                echo "<script>window.location.href='users.php?etat=1';</script>;";
            }
            else
            {
                echo "<script>window.location.href='users.php?etat=2';</script>;";
            }
            $stat->close();
        }
        ?>
        <a href="users.php" >
            <button class="btn btn-primary float-left">Retour</button>
        </a>
        <h3 class="text-center">Nouvel Utilisateur</h3>

        <div class="panel-body">
            <form role="form" id="frmPlan" method="post" action="add_user.php">


                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nom</label>
                        <input type="text" class="form-control" id="pname" name="username" placeholder="Entrer le nom" autocomplete="off">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" id="pname" name="email" placeholder="Email" autocomplete="off">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" id="pname" name="password" placeholder="Mot de passe" autocomplete="off">
                    </div>

                </div>


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