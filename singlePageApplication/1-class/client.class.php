<?php 
class client {
	use genos;

	public $id;
	public $nom;
	public $prenom;
	public $email;

	public function __construct(){
		$this->id 		= 0;
		$this->nom 		= "";
		$this->prenom 	= "";
		$this->email 	= "";
	}

	public static function TplClient(){ ?>
		<template id="tpl-client">
			<div class="col-md-12 bloc">
				<h1><i class="fas fa-users"></i> Gestion des Clients <span class="badge badge-pill badge-success">{{clientsFiltre.length}}</span></h1>
				<div class="row">
				  <div class="col-md-2">
				    <router-link to="/client/fiche/0" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Ajouter</router-link>
				  </div>

				  <div class="col-md-10">
				    <div class="input-group mb-3">
				      <div class="input-group-prepend">
				        <button class="btn btn-info" type="button"><i class="fas fa-search"></i></button>
				      </div>
				      <input type="text" v-model="rech" class="form-control" placeholder="Rechercher..." >
				    </div>
				  </div>
				</div> <!-- Fin de row -->

				<div class="row">
				  <div class="col-md-12">
				    <div class="table-responsive">
				      <table class="table table-striped">
				        <thead>
				          <tr>
				            <th>#</th>
				            <th>Client</th>
				            <th>Email</th>
				            <th>Modifier</th>
				            <th>Supprimer</th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr v-for="client in clientsFiltre">
				            <td>#</td>
				            <td>{{client.prenom}} {{client.nom | uppercase }}</td>
				            <td>{{client.email}}</td>
				            <td><router-link :to="{name:'clientFiche', params:{clientId: client.id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Modifier</router-link></td>
				            <td><button @click="Supprimer(client)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</button></td>
				          </tr>
				        </tbody>
				      </table>
				    </div>
				  </div> <!-- Fin col-md-12 -->  
				</div><!-- Fin de row -->
			</div>
		</template>
	<?php }

	public static function TplClientFiche(){ ?>
		<template id="tpl-client-fiche">
			
				<div class="col-md-6 bloc">
					<h1><i class="fas fa-users"></i> Fiche Client</h1>
					<form action="#">
						<div class="form-group">
							<label>Nom</label>
							<input type="text" class="form-control form-control-sm" v-model="client.nom">
						</div>

						<div class="form-group">
							<label>Prénom</label>
							<input type="text" class="form-control form-control-sm" v-model="client.prenom">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control form-control-sm" v-model="client.email">
						</div>
						<hr>
						<router-link to="/client" class="btn btn-sm btn-secondary">Retour</router-link>
						<button type="button" @click="GetClient()" class="btn btn-sm btn-outline-secondary">Annuler</button>
						<button type="button" @click="Enregistrer()" class="btn btn-sm btn-outline-success">Enregistrer</button>
					</form>				  
				    
				</div> <!-- Fin col-md-12 -->  				
			
		</template>
	<?php }
}