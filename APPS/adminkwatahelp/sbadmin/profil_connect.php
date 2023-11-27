    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nom'];?> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="profil.php?id=<?php echo $_SESSION['idadmin'];?>"><i class="fa fa-user fa-fw"></i> Mon Profile</a>
            </li>
            <li class="divider"></li>
            <li><a href="aut/deconnect.php"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
            </li>
        </ul>
    </li>