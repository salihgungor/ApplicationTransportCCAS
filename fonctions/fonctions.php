<?php

function connexion(){
    $dsn='mysql:dbname=transport_ccas;host=localhost';
    $username='root';
    $passwd='';

    try{
        $dbh=new PDO($dsn,$username,$passwd);
    } catch (Exception $e) {
        echo 'Connexion échouée : '.$e->getMessage();
    }
    return $dbh;
}

function AjoutAdherent($nom,$prenom,$adresse,$dateadhesion,$remarque){
  $dbh= connexion();
  $PdoStatement = $dbh ->prepare("insert into adherents values (NULL,:nom,:prenom,:adresse,:dateadhesion,:remarque)");
  $PdoStatement->bindvalue("nom",$nom);
  $PdoStatement->bindvalue("prenom",$prenom);
  $PdoStatement->bindvalue("adresse",$adresse);
  $PdoStatement->bindvalue("dateadhesion",$dateadhesion);
  $PdoStatement->bindvalue("remarque",$remarque);
  if($PdoStatement->execute()){
    $PdoStatement->closeCursor();
    $dbh=null;
    }
    else{
    throw new Exception("Erreur ajout d'adherent");
    }
}
function ModifAdherent($id,$nom,$prenom,$adresse,$date,$remarque)
{
  $dbh = connexion();
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdoStatement = $dbh->prepare("update adherents set nom =:nom,prenom =:prenom,adresse =:adresse,dateAdhesion = :date,remarque = :remarque where id = :id ");
  $pdoStatement->bindvalue("nom",$nom);
  $pdoStatement->bindvalue("prenom",$prenom);
  $pdoStatement->bindvalue("adresse",$adresse);
  $pdoStatement->bindvalue("date",$date);
  $pdoStatement->bindvalue("remarque",$remarque);
  $pdoStatement->bindvalue("id",$id);
  if($pdoStatement->execute())
  {

  $pdoStatement->closeCursor();
  $dbh=null;
  }
  else
  {
  throw new Exception("Erreur modification d'adherent");
  }
}

function ModifTarifCourt($prix)
{
  $dbh = connexion();
  $pdoStatement = $dbh ->prepare("update typetrajet set prix = :trajetcourt WHERE id='2'");
  $pdoStatement->bindvalue("trajetcourt",$prix);
  if($pdoStatement->execute())
  {
    $pdoStatement->closeCursor();
    $dbh=null;
  }
    else
  {
    throw new Exception("Erreur modif prix trajet court");
  }
}
function ModifTarifMoyen($prix)
{
  $dbh = connexion();
  $pdoStatement = $dbh ->prepare("update typetrajet set prix = :trajetmoyen WHERE id='3'");
  $pdoStatement->bindvalue("trajetmoyen",$prix);
  if($pdoStatement->execute())
  {
    $pdoStatement->closeCursor();
    $dbh=null;
  }
    else
  {
    throw new Exception("Erreur modif prix trajet moyen");
  }
}
function ModifTarifLong($prix)
{
  $dbh = connexion();
  $pdoStatement = $dbh ->prepare("update typetrajet set prix = :trajetlong WHERE id='4'");
  $pdoStatement->bindvalue("trajetlong",$prix);
  if($pdoStatement->execute())
  {
    $pdoStatement->closeCursor();
    $dbh=null;
  }
    else
  {
    throw new Exception("Erreur modif prix trajet long");
  }
}
function ModifTarifAdhesion($prix)
{
  $dbh = connexion();
  $pdoStatement = $dbh ->prepare("update typetrajet set prix = :tarifadhesion WHERE id='5'");
  $pdoStatement->bindvalue("tarifadhesion",$prix);
  if($pdoStatement->execute())
  {
    $pdoStatement->closeCursor();
    $dbh=null;
  }
    else
  {
    throw new Exception("Erreur modif prix adhésion");
  }
}
function ModifSeuil($prix)
{
  $dbh = connexion();
  $pdoStatement = $dbh ->prepare("update typetrajet set prix = :seuil WHERE id='1'");
  $pdoStatement->bindvalue("seuil",$prix);
  if($pdoStatement->execute())
  {
    $pdoStatement->closeCursor();
    $dbh=null;
  }
    else
  {
    throw new Exception("Erreur modif prix du seuil");
  }
}

function ListerAdherent(){

  $dbh = connexion();
  try {

  $pdoStatement = $dbh->prepare("select * from adherents");
  $pdoStatement->execute();

  $result = $pdoStatement->fetchAll();
  return $result;
  } catch (Exception $e) {

    throw new Exception("erreur lors de la recuperation des adhérents " . $ex);

  }

}

function GetTarif()
{
  $dbh = connexion();
  try{

    $pdoStatement = $dbh->prepare("select prix from typetrajet");
    $pdoStatement->execute();

    $result = $pdoStatement->fetchAll();
    return $result;

  }
  catch(Exception $e)
  {
    throw new Exception("erreur lors de la recuperation des tarif ");
  }

}

function getDateDepasse(){
  $dbh = connexion();
  try{

    $pdoStatement = $dbh->prepare("");
    $pdoStatement->execute();

    $result = $pdoStatement->fetch();
    return $result;

  }
  catch(Exception $e)
  {
    throw new Exception("erreur lors de la recuperation des tarif ");
  }
}

<<<<<<< HEAD

function encodeToExcel($tableau){


}


function pdfAdherent(){

  $dbh = connexion();

  $ListerAdherent = ListerAdherent();

  $pdf = new PDF();
  $pdf->addPage();
  
}

=======
>>>>>>> 22ab68ec68084025402e6eb678eb037d34f26dd6
?>
    