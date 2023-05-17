<?php
    include('dbconnect.php');
    if (isset($_POST['tel'])) {
        // var_dump($_POST);
        foreach($_POST as $key => $post){
            $$key = $post;
            
        }

        $stmt = $bdd->prepare("INSERT INTO `contact`(`prenom`, `nom`, `mail`, `tel`) 
        VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $prenom, $nom, $mail, $tel);
        $stmt->execute();



        
        $req = "SELECT id from `contact` ORDER BY id DESC LIMIT 1";
        $curseur = mysqli_query($bdd, $req);
        $row = mysqli_fetch_assoc($curseur);

        $idC = $row["id"];
        $bol = ["false" => 0, "true" => 1];
        $proprio = $bol[$proprio];
        $maison = $bol[$maison];
        $old = $bol[$old];

        $req = "INSERT INTO logement(id_contact, proprio, maison, surface, residant, chauffage, old, code_postal)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($bdd, $req);
        $stmt->bind_param("iiidisii",$idC, $proprio, $maison, $surface, $residant, $chauffage, $old, $zip);
        $stmt->execute();

        // mail('kouatebryan38@gmail.com','test', $tel);


    }elseif (isset($_POST['telU'])) {
        foreach($_POST as $key => $post){
            $$key = $post;
        }
        $req = "INSERT INTO `contact`(`prenom`, `tel`) 
        VALUES ('inconnu', ?)";
        $stmt = mysqli_prepare($bdd, $req);
        $stmt->bind_param("s", $telU);
        $stmt->execute();
    }

?>
<!DOCTYPE html>
<html lang="en">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11173138381">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11173138381');
</script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0, shrink-to-fit=no">
    <meta name="description" content="Vous voulez connaître le montant de votre prime Ma Prime Renov ? Utilisez notre simulateur en ligne et obtenez une estimation personnalisée en quelques clics. Découvrez les économies potentielles et lancez-vous dans vos travaux de rénovation énergétique. Cliquez ici pour simuler votre prime dès maintenant.">
    <meta name="keywords" content="Ma prime rénov, pompe à chaleur, fuel, aide de l'état, simulation aides, économies d'énergie, rénovation énergétique, chaudière, isolation thermique, subventions, éco-prêt à taux zéro, crédit d'impôt, facture énergétique, énergies renouvelables, audit énergétique, dépenses éligibles, prime énergie, travaux de rénovation, performance énergétique, système de chauffage, transition énergétique, panneaux solaires, environnement, développement durable, contrat d'entretien">
    <meta name="author" content=" Direct Installateur">
    <title>Direct installateur</title>
    <link rel="icon" href="assets/img/favicon.ico" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><img alt="Logo Direct Installateur" src="assets/img/Copie de Direct installateur.png" width="60" height="71" /></span><span>Direct Installeur</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#a-propos">A propos de nous</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#simuler">Simulez votre elegibilité</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#joindre">Être rappellé</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header >
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <!-- <p class="fw-bold text-success mb-2">Voted #1 Worldwide</p> #} -->
                        <h1 class="fw-bold">Direct Installeur</h1> <h2> - Vos dossiers, notre priorité</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);"><img class="img-fluid" alt="Maison chaleureuse et bien isolé grâce à ma prime renov" data-bss-parallax="" data-bss-parallax-speed="0.8" src="assets/img/products/house-g2db578cbc_1280.jpg"></div>
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);"><img class="img-fluid" alt="*Tasse Love avec des gants" data-bss-parallax="" data-bss-parallax-speed="0.4" src="assets/img/products/winter-g822897ffd_1280.jpg"></div>
                        <div style="position: relative;flex: 0 0 60%;transform: translate3d(0, 0%, 0);"><img class="img-fluid" alt="pompes à chaleur et leurs moteurs" data-bss-parallax="" data-bss-parallax-speed="0.25" src="assets/img/products/air-conditioner-g0f3053755_1280.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5 rounded bg-primary-gradient" id="a-propos">
            <div class="container">
                <div class="text-center mx-auto">
                    <h3 class="fw-bold">A propos de nous</h3>
                    <br>
                    <p class="mb-0">Bienvenue sur notre site dédié aux pompes à chaleur, à la rénovation énergétique et aux solutions de chauffage écologiques. Nous sommes une équipe passionnée par les énergies renouvelables et engagée à vous fournir les informations les plus pertinentes et les conseils les plus avisés pour vous aider à faire des choix éclairés.

        </p><p> Notre objectif est de démystifier le domaine des pompes à chaleur et de vous guider tout au long du processus de sélection et d'installation. Que vous recherchiez une pompe à chaleur air-air, air-eau, géothermique ou toute autre variante, nous sommes là pour vous accompagner.

        </p><p> Nous comprenons que chaque projet de chauffage est unique, c'est pourquoi nous vous offrons des guides d'achat détaillés, des comparaisons de produits, des conseils sur les aides financières disponibles et bien plus encore. Notre expertise repose sur une solide expérience et une connaissance approfondie du marché.
        </p><p>
Nous croyons fermement en l'importance de la transition vers des solutions de chauffage plus respectueuses de l'environnement. C'est pourquoi nous mettons en avant les avantages des énergies renouvelables et de la rénovation énergétique à travers nos articles informatifs et nos recommandations.
        </p><p>
Nous sommes ravis de vous accompagner dans votre parcours vers un système de chauffage efficace, écologique et économique. Explorez notre site, posez-nous vos questions et laissez-nous vous aider à trouver la solution de chauffage qui correspond le mieux à vos besoins.
        </p><p>
Faites confiance à notre expertise et rejoignez-nous dans cette transition vers un avenir énergétique plus durable !
        </p><br></br><p class="text-right blockquote-footer">
<b>L'équipe de Direct Installateur </b></p>
                </div>
            </div>
    </section>
    <section class="py-5" id="simuler">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-lg-6 col-xl-6 text-center mx-auto">
                    <h3 class="fw-bold">Simulez votre éligibilité à MaPrimeRénov'</h3>
                </div>
            </div>
            <form id="form_info" method="POST">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="row">
                            <div class="col-lg-6 my-4"><label class="form-label">Etes-vous :</label>
                                <div class="form-check"><input class="form-check-input" type="radio" id="proprio_true" name="proprio" value="true" checked><label class="form-check-label" for="proprio_true">Propriétaire</label></div>
                                <div class="form-check"><input class="form-check-input proprio_false" type="radio" id="proprio_false" name="proprio" value="false"><label class="form-check-label" for="proprio_false">Locataire</label></div>
                            </div>
                            <div class="col-lg-6 my-4"><label class="form-label">Bien concerné :</label>
                                <div class="form-check"><input class="form-check-input" name = "maison" type="radio" id="maison_true" value="true" checked><label class="form-check-label" for="maison_true">Maison individuelle</label></div>
                                <div class="form-check"><input class="form-check-input" name = "maison" type="radio" id="maison_false" value = "false"><label class="form-check-label" for="maison_false">Appartement</label></div>
                            </div>
                            <div class="col-lg-6 my-4"><label class="form-label">Surface (en m²) :&nbsp;</label><input pattern='^\d+(\.\d{1,4})?$' class="form-control form-control" type="text" name="surface"></div>
                            <div class="col-lg-6 my-4"><label class="form-label">Nombre de résident :</label><input class="form-control form-control" type="number" min="1" name="residant"></div>
                            <div class="col-lg-6 col-lg-4 my-4"><label class="form-label">Mode de chauffage actuel :</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check"><input class="form-check-input" type="radio" id="elec" name="chauffage" value="electrique" checked><label class="form-check-label" for="elec">Electrique</label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" id="fioul" name="chauffage" value="fioul"><label class="form-check-label" for="fioul">Fioul</label></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check"><input class="form-check-input" type="radio" id="gaz" name="chauffage" value="gaz"><label class="form-check-label" for="gaz">Gaz</label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" id="bois" name="chauffage" value="bois"><label class="form-check-label" for="bois">Bois</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 my-4"><label class="form-label">Votre bien a-t-il 15 ans ou plus ? :</label>
                                <div class="form-check"><input class="form-check-input" type="radio" id="old_true" name="old" value="true" checked><label class="form-check-label" for="old_true">Oui</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="old_false" name="old" value="false"><label class="form-check-label" for="old_false">Non</label></div>
                            </div>
                            <div class="col text-center"><button class="btn btn-primary" type="button" data-bs-target="#modal-1" data-bs-toggle="modal">Simuler</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="py-5">
        <div class="container" id="joindre">
            <div class="border rounded border-white d-flex flex-column justify-content-between align-items-center flex-lg-row bg-primary-gradient p-4 p-lg-5">
                <div class="text-center text-lg-start py-3 py-lg-1">
                    <h3 class="fw-bold mb-2">Demandez juste à être rappelé par un conseiller</h3>
                    <p class="mb-0"></p>
                </div>
                <form id="inconnu" class="d-flex justify-content-center flex-wrap flex-lg-nowrap" method="post">
                    <div class="my-2"><input class="form-control" type="text" placeholder="07xxxxxxxx" name="telU"></div>
                    <div class="my-2"><button class="btn btn-primary shadow ms-2" form="inconnu" type="submit">Envoyer&nbsp;</button></div>
                </form>
            </div>
        </div>
    </section>
    <footer class="bg-primary-gradient">
        <div class="container py-4 py-lg-5">
            <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Dernière étape - Vos coordonnés</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col col-6"><label class="form-label">Prenom</label><input form="form_info" class="form-control" type="text"  name="prenom"></div>
                                    <div class="col col-6"><label class="form-label">Nom</label><input form="form_info" class="form-control" type="text" name="nom"></div>
                                    <div class="col col-6"><label class="form-label">Téléphone</label><input form="form_info" class="form-control" type="text" placeholder="+337xxxxxxxx" required="" name="tel"></div>
                                    <div class="col col-6"><label class="form-label">Adresse mail</label><input form="form_info" class="form-control" type="text" placeholder="exemple@domaine.com" name="mail"></div>
                                    <div class="col"><label class="form-label">Code postal</label><input form="form_info" class="form-control" type="text" name="zip"></div>
                                </div>
                            
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit" form="form_info">Envoyer</button></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                
                <div class="row text-center ">
                    <div class="col-sm"><img src="assets/img/Direct installateur.png" alt="Logo Direct Installateur Complet" width="120" height="142" /></div>
                    <div class="col-sm align-self-center"><p><b> Certifié par :</b></p></div>
                    <div class="col-sm"><img src="assets/img/brands/CEE.jpg" alt="Les Certificats d'économies d'énergie" width="437" height="142" /></div>
                    <div class="col-sm"><img src="assets/img/brands/RGE.jpg" alt="Les Certificats d'économies d'énergie" width="213" height="142" /></div>
                </div>
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2022 Direct Installeur</p>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>