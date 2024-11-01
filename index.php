<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/1/css/main.css" />
    <link rel="stylesheet" href="assets/4/css/main.css" />
    <link rel="icon" href="images/logo2.ico" type="image/x-icon">
    <title>Gestion-scolaire</title>
    <style>
        body {
            font-size: 140%;
            line-height: 1.6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .content {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        p {
            text-align: justify;
        }
      
        .style2:hover {
            transform: scale(1.03);
        }

        .carousel-caption {
            width: 100%;
            position: absolute;
            top: 10%;
            left: 0;
            text-align: center;
            z-index: 3;
        }

        .carousel-inner>.carousel-item>img {
            width: 100%;
            height: auto;
        }

        .wrapper {
            margin-top: -6%;
        }

        footer {
            background-color: rgb(24, 20, 63);
            color: white;
            padding: 20px;
        }

        ul a {
            color: white;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            display: inline;
        }
    </style>
</head>

<body class="is-preload" style="background-color: rgba(0, 0, 0, 0.5);">


    <!-- Header -->
    <header id="header" style="background-color:rgb(24, 20, 63);">
        <a class="logo" href="index.php">Gestion-scolaire</a>
        <nav>
            <a href="#menu" style="color: white;">Menu</a>
        </nav>
    </header>

    <nav id="menu" style="background-color: rgb(24, 20, 63);">
        <ul class="links">
            <li><a href="index.php" style="color: white;">Accueil</a></li>
            <li><a href="" style="color: white;">FAQs</a></li>
            <li><a href="" style="color: white;">A propos</a></li>
            <li><a href="" style="color: white;">Contactez-nous</a></li>
        </ul>
    </nav>


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-block w-100">
                    <!-- Image -->
                    <img src="images/1/headerTogo.jpg" class="d-block " alt="..." >
                    <!-- Superposition bleue -->
                    <div class="blue-overlay"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 67.5%; background-color: rgba(24, 20, 63, 0.5);">
                    </div>
                    <!-- Texte -->
                    <div class="carousel-caption d-md-block">
                        <h1 style="color: white;">Bienvenue sur notre plateforme Gestion-Scolaire !</h1>
                       
                </div>
            </div>
        </div>
    </div>


    
		<!-- Portfolio -->
		<article id="portfolio" class="wrapper style3" style="margin-top: -13%;">
				<div class="container "  >
					<div class="row">
						<div class="col-4 col-6-medium col-12-small">
							<article class="box style2 shadow ">
								<a href="editeur/log1.php" class="image "><img src="" alt="" style="width: 100%; height: auto;" /></a>
								<h3><a href="editeur/log1.php">Inscrire un nouveau élève    <br><br></a></h3>
							</article>
						</div>

                        <div class="col-4 col-6-medium col-12-small">
							<article class="box style2 shadow" >
								<a href="editeur/log1-lo.php" class="image "><img src="" alt=""  style="width: 70%; height: auto;" /></a>
								<h3><a href="editeur/log1-lo.php">La liste des élève et leurs status</a></h3>
								
							</article>
						</div>
                        
                        <div class="col-4 col-6-medium col-12-small">
							<article class="box style2 shadow" >
								<a href="verify_ref.php" class="image "><img src="" alt=""  style="width: 70%; height: auto;" /></a>
								<h3><a href="verify_ref.php">Vérification d'une Facture<br><br><b></b></a></h3>
								
							</article>
						</div>
						
					</div>
			</article>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li>Copyright 2024</li>
                        <li><span>©| |Gestion-scolaire / FHC_GROUP</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/1/js/jquery.min.js"></script>
    <script src="assets/1/js/jquery.scrolly.min.js"></script>
    <script src="assets/1/js/browser.min.js"></script>
    <script src="assets/1/js/breakpoints.min.js"></script>
    <script src="assets/1/js/util.js"></script>
    <script src="assets/1/js/main.js"></script>
    <script src="assets/4/js/jquery.min.js"></script>
    <script src="assets/4/js/browser.min.js"></script>
    <script src="assets/4/js/breakpoints.min.js"></script>
    <script src="assets/4/js/util.js"></script>
    <script src="assets/4/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>
