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

        <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
        <input type="hidden" name="destination" value="Samoa">
        <button type="submit" class="reservation-button">
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
                </button>
                </form>

                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Anguilla">
                <button type="submit" class="reservation-button">
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
                </button>
                </form>

                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Antigua">
                <button type="submit" class="reservation-button">
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
                </button>
                </form>

                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Fidji">
                <button type="submit" class="reservation-button">
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
                </button>
                </form>

            <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Palaos">
                <button type="submit" class="reservation-button">

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

                </button>
                </form>

            
                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Panama">
                <button type="submit" class="reservation-button">
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
                </button>
                </form>

                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Monaco">
                <button type="submit" class="reservation-button">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/monaco.jpeg" alt="monaco.jpeg">
                        <h3>Monaco</h3>
                        <div class="flag">
                            <img src="../image/monaco-flag.png" alt="monaco-flag.png">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                Monaco : Le Refuge Fiscal de Prestige 🏝️💰
                Zéro impôt sur le revenu, aucune taxe sur la fortune ni sur les plus-values :
                     Monaco est le paradis fiscal européen par excellence. Avec sa stabilité politique, 
                     son cadre de vie luxueux et son accès privilégié aux marchés internationaux, la Principauté attire 
                     les grandes fortunes et les entrepreneurs en quête d’optimisation fiscale dans un environnement sécurisé et prestigieux.
                </div>
                </button>
                </form>

                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Bermudes">
                <button type="submit" class="reservation-button">
            <a href="bermudes.php" class="grid-line-container">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/bermudes.jpg" alt="bermudes.jpeg">
                        <h3>Bermudes</h3>
                        <div class="flag">
                            <img src="../image/bermudes-flag.png" alt="bermudes-flag.png">
                        </div>
                    </div>
                 </div>
                <div class="description-texte">
                Les Bermudes : Le Paradis Fiscal de l'Atlantique 🌴💼
                Aucune taxe sur le revenu, les sociétés, les plus-values ou les dividendes :
                les Bermudes sont l'escale idéale pour l'optimisation fiscale. Grâce à leur fiscalité ultra-attractive,
                leur stabilité économique et leur discrétion financière, l'archipel séduit les investisseurs et les entreprises 
                à la recherche d'un environnement propice à la rentabilité et à la sécurité.
                    </div>
                </button>
                </form>
               
                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="chypre">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/chypre.jpeg" alt="chypre.jpeg">
                        <h3>Chypre</h3>
                        <div class="flag">
                            <img src="../image/chypre.png" alt="chypre-flag.png">
                        </div>
                    </div>
                 </div>
                <div class="description-texte">
                Chypre : Un Hub Fiscal en Méditerranée 🌞💼
                Taux d’imposition sur les sociétés de seulement 12,5 %, exonération des plus-values et des dividendes :
                 Chypre offre une fiscalité des plus compétitives au cœur de l’UE. Avec son cadre juridique stable et ses avantages
                  fiscaux, l'île attire les entrepreneurs et investisseurs cherchant à optimiser leurs bénéfices dans un environnement 
                  sécurisé et stratégique.
                </div>
                </button>
                </form>

                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="malte">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/malte.jpg" alt="malte.jpeg">
                        <h3>Malte</h3>
                        <div class="flag">
                            <img src="../image/malte-flag.png" alt="malte-flag.png">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                Malte : Optimisation Fiscale au Cœur de l’UE 🇲🇹💼
                Taux d’imposition sur les sociétés à partir de 5 % grâce à un système de remboursement, plus aucune taxe 
                sur les plus-values et les dividendes : Malte combine fiscalité avantageuse et accès au marché européen. 
                L'île attire les investisseurs et entreprises recherchant un cadre fiscal compétitif dans un environnement stable et prospère.
                </div>
                </button>
                </form>

                <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Eau">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/EAU.jpg" alt="EAU.jpeg">
                        <h3>Émirats arabes unis</h3>
                        <div class="flag">
                            <img src="../image/EAU-flag.png" alt="EAU-flag.png">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                EAU : Un Paradis Fiscal au Cœur du Moyen-Orient 🏙️💼
                Aucune taxe sur le revenu, les sociétés, les plus-values ou les dividendes : les Émirats arabes unis sont une destination 
                fiscale de premier choix. Grâce à leur fiscalité ultra-compétitive, leur stabilité politique et leur environnement économique 
                prospère, les EAU attirent les entreprises et les investisseurs à la recherche d’un cadre fiscal optimal dans un centre d’affaires
                 dynamique.
                </div>
                </button>
                </form>
            <form class="grid-line-container" method="post" action="../php_pages/description-pages.php">
                <input type="hidden" name="destination" value="Caimans">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="../image/caimans.jpg" alt="caimans.jpeg">
                        <h3>Caïmans</h3>
                        <div class="flag">
                            <img src="../image/caimans-flag.png" alt="caimans-flag.png">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                Caïmans : Le Centre Financier Offshore Idéal 🌴💰
                Zéro impôt sur le revenu, les sociétés, les plus-values ou les dividendes : les îles Caïmans offrent une fiscalité 
                exceptionnelle pour les entreprises et les investisseurs. Grâce à leur stabilité économique, leur cadre juridique souple
                 et leur discrétion financière, les Caïmans sont une destination privilégiée pour l’optimisation fiscale.
                </div>
                </button>
                </form>





        </div>

    </div>

</main>


<?php
require_once "../php_pages/footer.php";
?>

</body>

</html>