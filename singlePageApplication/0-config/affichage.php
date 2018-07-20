<?php function Menu(){ ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">SPA Demo</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <router-link to="/" class="nav-link" ><i class="fas fa-home"></i> Accueil </a>
	      </li>
	      <li class="nav-item ">
	      	<router-link to="/client" class="nav-link"><i class="fas fa-users"></i> Clients</router-link>
	        <!-- <a class="nav-link" href="#"><i class="fas fa-users"></i> Clients <span class="sr-only">(current)</span></a> -->
	      </li>
	      <li class="nav-item ">
	      	<router-link to="/categorie" class="nav-link"><i class="fas fa-box"></i> Catégories</router-link>
	      </li>
	      <li class="nav-item ">
	        <router-link to="/produit" class="nav-link" href="#"><i class="fas fa-tshirt"></i> Produits</router-link>
	      </li>
	      <li class="nav-item ">
	        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Commandes <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	    
	  </div>
	</nav>
<?php }