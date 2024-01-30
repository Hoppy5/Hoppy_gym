

<style media="print" type="text/css">
  #hidden{
    display: none;
  }
  body{
    background-color: white;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="hidden" >
    <a class="navbar-brand" href="#"><span style="font-weight: bold;">HOPPY-GYM</span> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="equipment.php">Equipements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member.php">Membres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="plan.php">Plan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php">Utilisateurs</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-primary" href="">
                    <?php echo $_SESSION['email'];?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link btn btn-danger btn-sm text-white" href="logout.php">Déconnexion</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Rechercher..." aria-label="Rechercher">
        </form>
    </div>
</nav>