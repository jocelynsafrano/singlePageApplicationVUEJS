var index = Vue.component("index",{
	template:` <div class="col-md-6 offset-md-3">
				<h2>Démonstration SPA</h2>
				<div class="center">
					<img src="img/logo.png" class="img-fluid ">
				</div>
			   </div>
			`,
});





var routes = [
	{path:'/', name:'index', component: index},
	{path:'/categorie', name:'categorie', component: categorie},
	{path:'/client', name:'client', component: client},
	{path:'/client/fiche/:clientId', name:'clientFiche', component: clientFiche},
	{path:'/produit', name:'produit', component: produit},
	{path:'/produit/fiche/:produitId', name:'produitFiche', component: produitFiche},
	
];

var router = new VueRouter({
	
	routes,
});

new Vue({
	el:"#app",
	router:router,
	data:{
		
	},
	mounted:function(){

	},
	filters:{

	}
});