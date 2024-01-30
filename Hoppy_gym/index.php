<?php
session_start();
global $conn;
include_once "db.php";

// Authentification de l'utilisateur
if (isset($_POST['login'])) {
    $nom_utilisateur = $_POST['username'];
    $email = $_POST['email'];

    $mot_de_passe = md5($_POST['password']);

    // Vérification des informations d'authentification dans la base de données
    $requete = "SELECT * FROM users WHERE username = '$nom_utilisateur' AND password = '$mot_de_passe' AND email = '$email'";
    $resultat = $conn->query($requete);

    if ($resultat->num_rows > 0) {
        // L'utilisateur est authentifié avec succès
        $_SESSION['username'] = $nom_utilisateur;
        $_SESSION['email'] = $email;

        header("Location: home.php"); // Rediriger vers la page du tableau de bord
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}



?>


<!DOCTYPE html>
<?php include_once "head.php"; ?>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
}
.bg-img{
  background: url('bg.jpg');
  height: 100vh;
  background-size: cover;
  background-position: center;
}
.bg-img:after{
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0,0,0,0.7);
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 999;
  text-align: center;
  padding: 60px 32px;
  width: 370px;
  transform: translate(-50%,-50%);
  background: rgba(255,255,255,0.04);
  box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
}
.content header{
  color: white;
  font-size: 33px;
  font-weight: 600;
  margin: 0 0 35px 0;
  font-family: 'Montserrat',sans-serif;
}
.field{
  position: relative;
  height: 45px;
  width: 100%;
  display: flex;
  background: rgba(255,255,255,0.94);
}
.field span{
  color: #222;
  width: 40px;
  line-height: 45px;
}
.field input{
  height: 100%;
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: #222;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.space{
  margin-top: 16px;
}
.show{
  position: absolute;
  right: 13px;
  font-size: 13px;
  font-weight: 700;
  color: #222;
  display: none;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.pass-key:valid ~ .show{
  display: block;
}
.pass{
  text-align: left;
  margin: 10px 0;
}
.pass a{
  color: white;
  text-decoration: none;
  font-family: 'Poppins',sans-serif;
}
.pass:hover a{
  text-decoration: underline;
}
.field input[type="submit"]{
  background: #3498db;
  border: 1px solid #2691d9;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.field input[type="submit"]:hover{
  background: #2691d9;
}
.login{
  color: white;
  margin: 20px 0;
  font-family: 'Poppins',sans-serif;
}
.links{
  display: flex;
  cursor: pointer;
  color: white;
  margin: 0 0 20px 0;
}
.facebook,.instagram{
  width: 100%;
  height: 45px;
  line-height: 45px;
  margin-left: 10px;
}
.facebook{
  margin-left: 0;
  background: #4267B2;
  border: 1px solid #3e61a8;
}
.instagram{
  background: #E1306C;
  border: 1px solid #df2060;
}
.facebook:hover{
  background: #3e61a8;
}
.instagram:hover{
  background: #df2060;
}
.links i{
  font-size: 17px;
}
i span{
  margin-left: 8px;
  font-weight: 500;
  letter-spacing: 1px;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.signup{
  font-size: 15px;
  color: white;
  font-family: 'Poppins',sans-serif;
}
.signup a{
  color: #3498db;
  text-decoration: none;
}
.signup a:hover{
  text-decoration: underline;
}
</style>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>HOPPY-GYM</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body style="background-image:url('images/rendu-3d-salle-gym-fitness-loft-moderne.jpg');background-size:cover; background-repeat: no-repeat;">
      <div class="bg-img">
         <div class="content">
            <header>HOPPY-GYM</header>
            <form action="" method="post">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" name="username" required placeholder="Nom utilisateur">
               </div>

                <div class="field space">
                    <span class="fa fa-envelope"></span>
                    <input type="email" name="email" required placeholder="Email">
                </div>

               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" name="password" class="pass-key" required placeholder="Mot de passe">
                  <span class="show">Afficher</span>
               </div>
               <div class="pass">
                  <a href="#">Mot de passe oublié?</a>
               </div>
               <div class="">
                   <button type="submit" name="login" CLASS="btn btn-block btn-lg btn-primary">Se connecter</button>
               </div>
            </form>
         </div>
      </div>
      <script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
          if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "Cacher";
            showBtn.style.color = "#3498db";
          }else{
            pass_field.type = "password";
            showBtn.textContent = "Afficher";
            showBtn.style.color = "#222";
          }
         });
      </script>
   </body>
</html>