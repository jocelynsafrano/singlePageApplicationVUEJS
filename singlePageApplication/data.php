<?php include("0-config/config-genos.php"); 

$cas = $_GET["cas"];

switch ($cas) {
	case 'produits':
		$p 		= new produit;
		$req 	= "SELECT p.*, c.nom as categorie 
				   FROM produit p 
				   INNER JOIN categorie c ON c.id = p.id_cat
				";
		$champs = $p->FieldList();
		$champs[] = "categorie";
		$liste 	= $p->StructList($req,$champs,"json");
		echo $liste;
	break;

	case 'produitId':
		$p 		= new produit;
		$p->id = $_POST["id"];
		$p->Load();
		echo json_encode($p);
	break;

	case 'produitSave':
		$p 		= new produit;
		$p->id = $_POST["id"];
		if($p->id > 0) $p->Load();
		$p->LoadArray($_POST["produit"]);
		if($p->id > 0) $p->Update();
		else $p->Add();
		// var_dump($p);
	break;

	case 'supprProduit':
		$p 		= new produit;
		$p->id 	= $_POST["id"];
		$p->Load();
		$p->Delete();
	break;

	case 'categories':
		$c 		= new categorie;
		$req 	= "SELECT * FROM categorie";
		$champs = $c->FieldList();
		$liste 	= $c->StructList($req,$champs,"json");
		echo $liste;
	break;

	case 'addCat':
		$c 		= new categorie;
		$c->nom = $_POST["nom"];
		$c->Add();
	break;

	case 'modifCat':
		$c 		= new categorie;
		$c->id 	= $_POST["cat"]["id"];
		$c->Load();
		$c->nom = $_POST["cat"]["nom"];
		$c->Update();
	break;

	case 'supprCat':
		$c 		= new categorie;
		$c->id 	= $_POST["id"];
		$c->Load();
		$c->Delete();
	break;

	case 'clients':
		$c 		= new client;
		$req 	= "SELECT * FROM client";
		$champs = $c->FieldList();
		$liste 	= $c->StructList($req,$champs,"json");
		echo $liste;
	break;

	case 'clientId':
		$c 		= new client;
		$c->id = $_POST["id"];
		$c->Load();
		echo json_encode($c);
	break;

	case 'clientSave':
		$c 		= new client;
		$c->id = $_POST["id"];
		if($c->id > 0) $c->Load();
		$c->LoadArray($_POST["client"]);
		if($c->id > 0) $c->Update();
		else $c->Add();
		var_dump($c);
	break;

	case 'clientSuppr':
		$c 		= new client;
		$c->id = $_POST["id"];
		$c->Delete();
	break;
}