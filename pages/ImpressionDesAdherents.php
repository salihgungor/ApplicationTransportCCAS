<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Impression des adhérents</title>
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
                { extend: 'print', text: '<span class="glyphicon glyphicon-print"></span> Imprimer' , className: 'btn btn-info'},

                { extend: 'csv', text: '<span class=" glyphicon glyphicon-paperclip"></span> Sortie format csv', className: 'btn btn-info'}
              ],
              "dom": '<"top"lfi>rt<"bottom"Bp>',

      });


  });
  </script>
</head>
<body>
  <div class="content-loader" style="width: 70%;margin:5% 13%;">

  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-responsive no-footer table-bordered" id="example">

    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Date d'adhésion</th>
        <th>Remarques</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Date d'adhésion</th>
        <th>Remarques</th>
      </tr>
    </tfoot>
  </div>

  <?php
  $lesAdherents = ListerAdherent();
  foreach($lesAdherents as $unAdherent)
  {
    echo '<td>'.$unAdherent['nom'].'</td>';
    echo '<td>'.$unAdherent['prenom'].'</td>';
    echo '<td>'.$unAdherent['adresse'].'</td>';
    echo '<td>'.$unAdherent['dateAdhesion'].'</td>';
    echo '<td>'.$unAdherent['remarque'].'</td>';
    echo '</tr>';
  }

  ?>

  </table>
  <form action="accueil.php" id="btnimpression" class="testtest">
      <input class="btn btn-info" type="submit" value="accueil">

  </form>
</body>

</html>