<?php 
class produit {
	use genos;

	public $id;
	public $id_cat;
	public $nom;
	public $pu;
	

	public function __construct(){
		$this->id 		= 0;
		$this->id_cat	= 0;
		$this->nom 		= "";
		$this->pu 		= 0;
	}

	public static function TplProduit(){ ?>
		<template id="tpl-produit">
			<div class="col-md-12 bloc">
				<h1><i class="fas fa-tshirt"></i> Gestion des Produits <span class="badge badge-pill badge-success">{{produitsFiltre.length}}</span></h1>
				<div class="row">
				  <div class="col-md-2">
				    <router-link :to="{name:'produitFiche', params:{produitId:0}}"  class="btn btn-outline-primary"><i class="fas fa-plus"></i> Ajouter</button>
				  </div>

				  <div class="col-md-4">
				    <div class="input-group mb-3">
				      <div class="input-group-prepend">
				        <button class="btn btn-info" type="button"><i class="fas fa-search"></i></button>
				      </div>
				      <input type="text" v-model="rech" class="form-control" placeholder="Rechercher..." >
				    </div>
				  </div>

				  <div class="col-md-4">
				  	<div class="input-group mb-3">
				  	  <div class="input-group-prepend">
				  	    <button class="btn btn-info" type="button"><i class="fas fa-box"></i></button>
				  	  </div>
				  	  <select class="custom-select" v-model="id_cat">
				  	    <option value="">Filtrer par Catégorie</option>
				  	    <option v-for="cat in categories" :value="cat.id">{{cat.nom}}</option>
				  	  </select>
				  	</div>
				  </div>

				  <div class="col-md-1">
				  	<div class="col-md-12">
				  		<div class="btn-group" role="group" aria-label="Basic example">
				  		  <button type="button" id="btn-mode-1" class="btn-mode btn btn-info btn-sm" @click="ChangerMode(1,$event)"><i class="fas fa-list"></i></button>
				  		  <button type="button" id="btn-mode-2" class="btn-mode btn btn-outline-info" @click="ChangerMode(2,$event)"><i class="fas fa-table"></i></button>
				  		</div>
				  	</div>	
				  </div>
				</div> <!-- Fin de row -->
				
				
				<br>
				<div class="row" v-if="mode == 1">
				  <div class="col-md-12" >
					    <div class="table-responsive" >
					      <table class="table table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Nom</th>
					            <th>Catégorie</th>
					            <th>Prix Unitaire</th>
					            <th>Modifier</th>
					            <th>Supprimer</th>
					          </tr>
					        </thead>
					        <tbody>
					          <tr v-for="produit in produitsFiltre">
					            <td>#</td>
					            <td>{{produit.nom }}</td>
					            <td>{{produit.categorie }}</td>
					            <td>{{produit.pu }} €</td>
					            <td><router-link :to="{name:'produitFiche', params:{produitId:produit.id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Modifier</router-link></td>
					            <td><button @click="Supprimer(produit)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button></td>
					          </tr>
					        </tbody>
					      </table>
					    </div>

					    
				  </div> <!-- Fin col-md-12 -->  
				</div><!-- Fin de row -->

				    <div class="row" v-if="mode == 2">
				    	<div class="col-md-3" v-for="produit in produitsFiltre">
				    		<div class="card">
				    		  <div class="card-body">
				    		    <h4 class="card-title">{{produit.nom }} <sup><span class="badge badge-success">{{produit.categorie}}</span></sup></h4>
				    		    <p class="card-text">
									<h5 class="text-right">{{produit.pu}} €</h5>
				    		    </p>
				    		    <router-link :to="{name:'produitFiche', params:{produitId:produit.id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Modifier</router-link>
				    		    	<button @click="Supprimer(produit)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button>
				    		  </div>
				    		</div>
				    	</div>
				    </div>
			</div>
		</template>
	<?php }

	

	public static function TplProduitFiche(){ ?>
		<template id="tpl-produit-fiche">
			
				<div class="col-md-6 bloc">
					<h1><i class="fas fa-tshirt"></i> Fiche Produit</h1>
					<form action="#">
						<div class="form-group">
							<label>Nom</label>
							<input type="text" class="form-control form-control-sm" v-model="produit.nom">
						</div>

						<div class="form-group">
							<label>Catégorie</label>
							<select class="form-control form-control-sm" v-model="produit.id_cat">
								<option value="">Sélectionner une catégorie</option>
								<option v-for="cat in categories" :value="cat.id">{{cat.nom}}</option>
							</select>

							
						</div>

						<div class="form-group">
							<label>Prix Unitaire</label>
							<input type="number" class="form-control form-control-sm" v-model="produit.pu">
						</div>
						<hr>
						<router-link to="/produit" class="btn btn-sm btn-secondary">Retour</router-link>
						<button type="button" @click="GetProduit()" class="btn btn-sm btn-outline-secondary">Annuler</button>
						<button type="button" @click="Enregistrer()" class="btn btn-sm btn-outline-success">Enregistrer</button>
					</form>				  
				    
				</div> <!-- Fin col-md-12 -->  				
			
		</template>
	<?php }
}