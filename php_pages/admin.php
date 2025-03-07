<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Admin</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta charset="UTF-8">
</head>
<body>

<header>
    <div class="header-container">

        <div class="header-left">
            <a href="../index.php" class="header-link">CY-TAXEVASION </a>
        </div>

        <div class="header-slogan">THE HOLIDAYS YOUR WALLET NEED</div>
        <div class="header-right">
            <div class="header-voir-voyage">
                <a href="../php_pages/destination.php" class="header-link header-voir-voyage-text">Voir nos voyages</a>
                <img class="header-jet-icon" src="../image/jet-icon.png" alt="jet-icon">
            </div>


            <a href="../php_pages/connexion.php" class="header-link">
                <div class="header-connect">Se connecter</div>
            </a>

            <a href="../php_pages/user.php" class="header-link-active"><img class="header-user-logo"
                                                                src="../image/user-icone.png"
                                                                alt="utilisateur-logo"></a>
        </div>
    </div>
</header>


<main>


    <div class="users-container">
        <h1>Panneaux Administrateur</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Firstname</th>
                <th>Mail</th>
                <th>Classification</th>
                <th>Option</th>
            </tr>
            <tr>
                <td>#1</td>
                <td>Paul</td>
                <td>Morel</td>
                <td>paul.morel@gmail.com</td>
                <td>
                    <label>
                        <select name="class-change">
                            <option value="Administrateur" selected>Administrateur</option>
                            <option value="Banni" >Banni</option>
                            <option value="Utilisateur">Utilisateur</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </label>
                </td>
                <td>
                    <button type="button">Supprimer</button>
                </td>
            </tr>
            <tr>
                <td>#2</td>
                <td>Florian</td>
                <td>Dupont</td>
                <td>florian.dupont@gmail.com</td>
                <td>
                    <label>
                        <select name="class-change">
                            <option value="Administrateur">Administrateur</option>
                            <option value="Banni" >Banni</option>
                            <option value="Utilisateur">Utilisateur</option>
                            <option value="VIP" selected>VIP</option>
                        </select>
                    </label>
                </td>
                <td>
                    <button type="button">Supprimer</button>
                </td>
            </tr>
            <tr>
                <td>#3</td>
                <td>Louis</td>
                <td>Richelieux</td>
                <td>louis.richelieux@gmail.com</td>
                <td>
                    <label>
                        <select name="class-change">
                            <option value="Administrateur">Administrateur</option>
                            <option value="Banni" >Banni</option>
                            <option value="Utilisateur" selected>Utilisateur</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </label>
                </td>
                <td>
                    <button type="button">Supprimer</button>
                </td>
            </tr>
            <tr>
                <td>#4</td>
                <td>Antonio</td>
                <td>robber</td>
                <td>antonio.robber@gmail.com</td>
                <td>
                    <label>
                        <select name="class-change">
                            <option value="Administrateur">Administrateur</option>
                            <option value="Banni" selected>Banni</option>
                            <option value="Utilisateur">Utilisateur</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </label>
                </td>
                <td>
                    <button type="button">Supprimer</button>
                </td>
            </tr>
        </table>
        <div class="confirm-button">
            <button type="submit">Confirmer Les Modifications</button>
        </div>

    </div>
</main>


<footer>
    <div class="footer-container">
      <div class="contact" >
        <a href="../php_pages/contact.php" class="footer-contact">Nous contacter</a>
        <a href="about-us.php" class="footer-contact">Qui sommes-nous ?</a>
      </div>
      <div class="socials">
        <div>Nos réseaux : </div>
        <a class="twitter-logo" href="https://x.com/?mx=2" target="_blank"><img  src="../image/twitter-logo.png" alt="twitter-logo"></a>
        <a class="instagram-logo" href="https://www.instagram.com/" target="_blank"><img src="../image/instagram-logo.png" alt="instagram-logo.png"></a>
      </div>
    </div>
  </footer>


</body>
</html>