<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Renouvellement  des adherents pour le trimestre suivant</title>
  <?php
  include_once "header.php";
  include_once "../fonctions/fonctions.php";

  ?>
  <link href="assets/datatables.min.css" rel="stylesheet" type="text/css"> <!-- ici-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> <!-- ici-->
  <script type="text/javascript" src="assets/datatables.min.js"></script> <!-- ici-->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>


  <script language="javascript" type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'csv'
        ]
      });
    });
  </script>
</head>
<body>
  <div class="content-loader" style="width: 70%;margin:5% 13%;">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-responsive no-footer table-bordered" id="example">

      <thead>
        <tr>
          <th>Trimestre</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Adresse</th>
          <th>Date d'adhesion</th>
          <th>Coût actuel des adhésions</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Trimestre</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Adresse</th>
          <th>Date d'adhesion</th>
          <th>Coût actuel des adhésions</th>
        </tr>
      </tfoot>
    </div>
    <?php
    $trimestreSuivant = getTrimestreSuivant();


    $lesAdherents = ListerAdherent();

    foreach($lesAdherents as $unAdherent){

    $dateAdhesion = $unAdherent['dateAdhesion'];
    $dateMois = date("m",strtotime($dateAdhesion));



    if(in_array($dateMois,$trimestreSuivant)){


    $anneeMaintenant = date('y');
    $anneeAdherent = date("y",strtotime($dateAdhesion));
    $trimestreSuivantNb = getTrimestreSuivantNb();
    if($anneeAdherent < $anneeMaintenant)
    {
        $prixAdhesionActuel = Getprixadhesion();
        $getTrimestreLibelle = getTrimestreLib($trimestreSuivantNb);
        echo '<tr>';
        echo '<td>'.$getTrimestreLibelle['libelle'].'</td>';
        echo '<td>'.$unAdherent['nom'].'</td>';
        echo '<td>'.$unAdherent['prenom'].'</td>';
        echo '<td>'.$unAdherent['adresse'].'</td>';
        echo '<td>'.$unAdherent['dateAdhesion'].'</td>';
        echo '<td style=font-weight:bold;>'.$prixAdhesionActuel['prix'].' €</td></tr>';
      }
    }
  }

  ?>

  </table>
  <form action="accueil.php" id="btnimpression">
  <input class="btn btn-default" type="submit" value="accueil">
</form>
</body>

</html>