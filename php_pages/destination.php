<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nos destinations</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/destination.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta charset="UTF-8">
</head>


<body>

<?php
require_once "../php_pages/header.php";
?>


<main>


    <div class="destination-intro">
        <div class="intro-text">
            <h1>Nos paradis fiscaux n'attendent que vous</h1>

        </div>
        <img class="intro-image" src="../image/destination-intro.jpg" alt="destination-image">
    </div>

    <div class="destination-option-container">
        <h2>Choisissez vos préférences :</h2>

        <div class="destination-option-slider-container">

            <div class="option-select">
                <h5>Prix :</h5>
                <label>
                    <select>
                        <option value="" selected hidden>Choisissez une option</option>
                        <option value="-1000">< 1000 $</option>
                        <option value="1000-2000">1000-2000 $</option>
                        <option value="2000-3000">2000-3000 $</option>
                        <option value="+3000"> > 3000 $</option>
                    </select>
                </label>
            </div>

            <div class="option-select">
                <h5>Durée :</h5>
                <label>
                    <select>
                        <option value="" selected hidden>Choisissez une option</option>
                        <option value="1 - week-end">1 - week-end</option>
                        <option value="1 - semaine">1 - semaine</option>
                        <option value="2 - semaine">2 - semaine</option>
                        <option value="3 - semaine">3 - semaine</option>
                        <option value="1 - mois">1 - mois</option>
                    </select>
                </label>
            </div>

            <div class="option-select">
                <h5>Repas :</h5>
                <label>
                    <select>
                        <option value="" selected hidden>Choisissez une option</option>
                        <option value="Matin">Matin</option>
                        <option value="Midi - Soir">Midi - Soir</option>
                        <option value="Matin - Midi - Soir">Matin - Midi - Soir</option>
                    </select>
                </label>
            </div>

            <div class="option-select">
                <h5>Continent :</h5>
                <label>
                    <select>
                        <option value="" selected hidden>Choisissez une option</option>
                        <option value="Amérique-Centrale">Amérique-Centrale</option>
                        <option value="Amérique-du-Sud">Amérique-du-Sud</option>
                        <option value="Océanie">Océanie</option>
                    </select>
                </label>
            </div>


        </div>

    </div>


    <div class="destination-grid">
        <div class="grid-container">

            <a href="samoa-americaine-description.php" class="grid-line-container">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/les-samoa-americaine.jpeg" alt="les-samoa_américaines">
                        <h3>Les Samoa-Américaines</h3>
                        <div class="flag">
                            <img src="../image/samoa-americaine-flag.jpg" alt="les-samoa-américaines-flag">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                    Un véritable paradis fiscal avec un taux d'imposition sur les
                    sociétés de 0%, <strong>aucune taxe</strong> sur les plus-values et un secret bancaire strict.
                    Rejoignez plus de <strong>5000
                        entreprises offshore</strong> bénéficiant d'une réglementation souple et d'un cadre tropical
                    idyllique.
                </div>
            </a>

            <a href="anguilla.php" class="grid-line-container">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/anguilla.jpg" alt="anguilla">
                        <h3>Anguilla</h3>
                        <div class="flag">
                            <img src="../image/anguilla-flag.jpg" alt="anguilla-flag">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                    L’un des paradis fiscaux les plus attractifs, avec <strong>0%
                    d'impôt
                    sur les sociétés, les plus-values et les revenus.</strong> Aucune exigence de déclaration financière
                    et un
                    secret bancaire renforcé. Plus de <strong>250 000 entreprises offshore</strong> y sont déjà
                    établies. Profitez d’une
                    fiscalité avantageuse sous le soleil des Caraïbes !
                </div>
            </a>

            <a href="antigua-barbuda.php" class="grid-line-container">

                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/antigua-et-barbuda.jpg" alt="antigua-et-barbuda">
                        <h3>Antigua-et-Barbuda</h3>
                        <div class="flag">
                            <img src="../image/antigua-et-barbuda-flag.jpg" alt="antigua-et-barbuda-flag">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                    Un refuge fiscal idéal avec <strong>0% d'impôt sur le
                    revenu,</strong>
                    les plus-values et les successions. Bénéficiez d’un passeport puissant grâce au programme de
                    citoyenneté par investissement, tout en profitant de <strong>365 plages paradisiaques.</strong> Un
                    climat fiscal et
                    tropical parfait pour vos affaires !
                </div>
            </a>

            <a href="fidji.php" class="grid-line-container">

                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/les-fidji.jpeg" alt="les_fidji">
                        <h3>Les Fidji</h3>
                        <div class="flag">
                            <img src="../image/les-fidji-flag.jpg" alt="les-fidji-flag">
                        </div>
                    </div>
                </div>

                <div class="description-texte">
                    Avec <strong>0 % d’impôt sur le revenu des sociétés étrangères et un
                    secret
                    bancaire strict,</strong> les Fidji offrent un cadre fiscal avantageux pour les investisseurs.
                    Profitez de
                    plages paradisiaques tout en bénéficiant d’un environnement financier souple et discret. Alliez
                    <strong>évasion fiscale et évasion tropicale</strong> en faisant des Fidji votre prochaine
                    destination d’affaires !
                </div>
            </a>

            <a href="les-palaos.php" class="grid-line-container">

                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/les-palaos.jpg" alt="les-palaos">
                        <h3>Les Palaos</h3>
                        <div class="flag">
                            <img src="../image/les-palaos-flag.jpg" alt="les-palaos-flag">
                        </div>
                    </div>
                </div>


                <div class="description-texte">
                    Avec <strong>aucun impôt sur les sociétés étrangères</strong> et une
                    réglementation
                    bancaire confidentielle, Palaos est une destination idéale pour optimiser vos finances. Offrant des
                    <strong>eaux cristallines</strong> et un <strong>climat</strong> idyllique, ce paradis fiscal vous
                    permet d’allier avantages fiscaux
                    et luxe tropical en toute sérénité.
                </div>

            </a>

            <a href="panama.php" class="grid-line-container">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/le-panama.jpg" alt="le-panama.jpg">
                        <h3>Le Panama</h3>
                        <div class="flag">
                            <img src="../image/le-panama-flag.jpg" alt="le-panama-flag">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                    Avec une <strong>imposition nulle sur les revenus étrangers</strong> et un système
                    bancaire réputé pour sa confidentialité, le Panama est un choix stratégique pour les entrepreneurs
                    et investisseurs. Profitez d’un cadre fiscal avantageux tout en vivant sous le <strong>soleil des Caraïbes,</strong>
                    entre gratte-ciels modernes et plages paradisiaques.
                </div>
            </a>
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