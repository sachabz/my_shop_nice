<!--NAVBAR-->
 <body>   
<section class="container mb-2">
                <h1 class="d-none">Navbar</h1>
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="background-color: white;">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarColor03">
                            <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                    <a class="nav-link" name="linkAll" href="?link=all">TOUS LES T-SHIRTS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" name="linkHomme" href="?link=homme">HOMMES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" name="linkFemme" href="?link=femme">FEMMES</a>
                                </li>
                            </ul>
                            <div class="d-flex">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                    <?php
                                            if (isset($_SESSION['firstname']))
                                            {
                                            
                                            } else {
                                                echo '<a class="nav-link" href="./inscription.php">INSCRIPTION</a>';
                                            }
                                            ?>
                                    </li>
                                    <li class="nav-item active">
                                         <?php
                                            if (isset($_SESSION['firstname']) && $_SESSION['admin'] === 1)
                                            {
                                                echo "<a class='nav-link' href='admin.php'>ADMIN</a>";
                                            }
                                        ?>
                                    </li>
                                    <li class="nav-item active">
                                         <?php
                                            if (isset($_SESSION['firstname']))
                                            {
                                                echo "<a class='nav-link' href='logout.php'>DECONNEXION</a>";
                                            }
                                            else
                                            {
                                                echo "<a class='nav-link' href='login.php'>CONNEXION</a>";
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </section>   

</body>
<!--NAVBAR-->
