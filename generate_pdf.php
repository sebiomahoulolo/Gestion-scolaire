<?php
use Dompdf\Dompdf;
use Dompdf\Options;
require_once 'config/connexion.php';
require_once 'dompdf/autoload.inc.php';

if (isset($_GET['id_eleve'])) {
    $id_eleve = $_GET['id_eleve'];

    // Récupérer les données des élèves
    $sql = 'SELECT * FROM eleve WHERE id_eleve = :id_eleve';
    $stmt = $pdo_conn->prepare($sql);
    $stmt->execute(['id_eleve' => $id_eleve]);
    $donnees = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($donnees) {
        // Générer une référence unique pour la facture
        $reference = 'FAC-' . $donnees['id_eleve'] . '-' . date('YmdHis');

        // Enregistrer la référence dans la base de données
        $sql_update = 'UPDATE eleve SET reference = :reference WHERE id_eleve = :id_eleve';
        $stmt_update = $pdo_conn->prepare($sql_update);
        $stmt_update->execute(['reference' => $reference, 'id_eleve' => $id_eleve]);

        // Commencer la mise en mémoire tampon de sortie
        ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        fieldset {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
        }
        legend {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
$imagePath = 'images/saint_bertin.jpg';
$imageData = base64_encode(file_get_contents($imagePath));
?>

<img src="data:image/jpg;base64,<?php echo $imageData; ?>" alt="Logo" style="width: 750px; height: 200px;" />

<h4 style="text-align:center; color:blue;">
  (+229) 69 67 69 69 / 97 60 07 84 || Rue derrière l’hôpital de Mènontin<br>
  www.saintbertinbbtou.com || @saintbertinbbtou
</h4>

<h3 style="text-align:center;">Année Académique : 2024 - 2025</h3>
<h1>FACTURE DE SCOLARITE</h1>
<strong>Référence de Facture :</strong> <?php echo $reference; ?><br>
<fieldset>
    <legend>Élève</legend>
    <strong>Nom et Prénom :</strong> <?php echo $donnees["nom_pre"]; ?><br>
    <strong>Numéro matricule :</strong> <?php echo $donnees["num_matric"]; ?><br>
    <strong>Classe :</strong> <?php echo $donnees["classe"]; ?><br>
    <strong>Numéro de téléphone des parents :</strong> <?php echo $donnees["tel_pere"]; ?><br>
    <strong>Frais de cantine :</strong> <?php echo $donnees["fr_cantine"]; ?><br>
    <strong>Frais scolarité :</strong> <?php echo number_format($donnees["fr_scol"], 3, ',', ' '); ?><br>
</fieldset>
<br>
<table>
    <tr>
        <th>Frais inscription</th>
        <td><?php echo number_format($donnees["fr_ins"], 3, ',', ' '); ?></td>
    </tr>
    <tr>
        <th>Frais scolarité</th>
        <td><?php echo number_format($donnees["fr_scol"], 3, ',', ' '); ?></td>
    </tr>
    <tr>
        <th>Frais TD</th>
        <td><?php echo number_format($donnees["fr_td"], 3, ',', ' '); ?></td>
    </tr>
    <tr>
        <th>Total à payer</th>
        <td><?php echo number_format($donnees["fr_ins"] + $donnees["fr_scol"] + $donnees["fr_td"], 3, ',', ' '); ?></td>
    </tr>
    <tr>
        <th>Montant déjà payé</th>
        <td><?php echo number_format($donnees["mont_p"], 3, ',', ' '); ?></td>
    </tr>
    <tr>
        <th>Reste à payer</th>
        <td><?php echo number_format(($donnees["fr_ins"] + $donnees["fr_scol"] + $donnees["fr_td"]) - $donnees["mont_p"], 3, ',', ' '); ?></td>
    </tr>
</table>
<br>
<table>
    <thead>
        <tr>
            <th>Tranche</th>
            <th>Date d'échéance</th>
            <th>Montant restant</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $donnees["tranches"]; ?></td>
            <td><?php echo $donnees["date"]; ?></td>
            <td><?php echo number_format(($donnees["fr_ins"] + $donnees["fr_scol"] + $donnees["fr_td"]) - $donnees["mont_p"], 3, ',', ' '); ?></td>
        </tr>
    </tbody>
</table>
<br><br><br>
<h4 style="margin-left: 35px;">Le comptable</h4>



</body>
</html>
<?php
        // Récupérer le contenu de la mémoire tampon
        $html = ob_get_contents();
        ob_end_clean();

        // Créer une instance de Dompdf
        $dompdf = new Dompdf();

        // Charger le contenu HTML
        $dompdf->loadHtml($html);

        // Définir la taille du papier et l'orientation
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $dompdf->render();

        // Nom de fichier plus complet et sécurisé
        $nom_fichier = $donnees['nom_pre']. '_' . date('Ymd') . '.pdf';

        // Envoyer le fichier PDF au navigateur
        $dompdf->stream($nom_fichier, array("Attachment" => true)); // true pour forcer le téléchargement
    } else {
        echo "Élève non trouvé.";
    }
} else {
    echo "ID de l'élève manquant.";
}
?>
