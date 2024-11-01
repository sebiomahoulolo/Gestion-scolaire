<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion-scolaire</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/1/css/" />
  <link rel="stylesheet" href="assets/4/css/main.css" />
  <link rel="stylesheet" href="css/style2.css">
  <link rel="icon" href="images/logo2.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="editeur/style1.css">
</head>
<body class="is-preload" >

<!-- Header -->
<header id="header" style="background-color:rgb(24, 20, 63);"><a class="logo" href="#">Gestion-scolaire</a>
<nav>
  <a href="#menu" style="color: white;">Menu</a>
</nav>
</header>

<nav id="menu" style="background-color: rgb(24, 20, 63);">
<ul class="links">
    <li><a href="index.php" style="color: white;">Accueil</a></li>
  </ul>
</nav>


<body>
    <form method="post" action="">
        <label for="reference">Référence de la Facture :</label>
        <input type="text" id="reference" name="reference" required>
        <input type="submit" value="Vérifier" style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer;">

    </form>

    <?php
    require_once 'config/connexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $reference = $_POST['reference'];
        
        // Debugging message to check the reference input
        
        
        // Vérifier l'existence de la référence de facture
        $sql = 'SELECT * FROM eleve WHERE reference = :reference';
        $stmt = $pdo_conn->prepare($sql);
        $stmt->execute(['reference' => $reference]);
        $donnees = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($donnees) {
            echo "<h2>Vérification réussie</h2>";
            echo "<p>Référence recherchée : " . $reference . " <span style='color: green;'>est valide</span><br></p>";
            echo "<p><strong>Nom de l'élève :</strong> " . $donnees["nom_pre"] . " en classe de " . $donnees["classe"] . ".</p>";
        } else {
           echo "<p style='color: red;'>Attention. Veuillez contacter votre administration comptable.</p>";
            echo "<p>Référence de facture introuvable.</p>";
        }
        
    }
    ?>




<style>
  
  /* Style pour les éléments de la liste non ordonnée */
ul {
  list-style: none; /* Supprime les puces */
  padding: 0; /* Supprime les marges intérieures */
  text-align: left; /* Aligne le texte à gauche */
}

/* Style pour les éléments de la liste */
ul li {
  display: inline; /* Affiche les éléments en ligne */
  margin-right: 10px; /* Ajoute un peu d'espace entre les éléments */
}

/* Style pour les liens dans la liste */
ul li a {
  color: white; /* Couleur du texte */
  text-decoration: none; /* Supprime le soulignement des liens */
}

  footer {

    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgb(24, 20, 63);
    color: white;
    padding: 6px;
  }
</style>
<footer >
    <div class="col">
	<ul>
                        <li>Copyright 2024</li>
                        <li><span>©| |Gestion-scolaire / FHC_GROUP</span></li>
                    </ul>
    </div>
  </div>
</footer>


		<!-- Scripts -->
        <script src="../assets/1/js/jquery.min.js"></script>
			<script src="../assets/1/js/jquery.scrolly.min.js"></script>
			<script src="../assets/1/js/browser.min.js"></script>
			<script src="../assets/1/js/breakpoints.min.js"></script>
			<script src="../assets/1/js/util.js"></script>
			<script src="../assets/1/js/main.js"></script>
      <script src="../assets/4/js/jquery.min.js"></script>
			<script src="../assets/4/js/browser.min.js"></script>
			<script src="../assets/4/js/breakpoints.min.js"></script>
			<script src="../assets/4/js/util.js"></script>
			<script src="../assets/4/js/main.js"></script>
            <script src="js.js"></script>

    
</body>
</html>
