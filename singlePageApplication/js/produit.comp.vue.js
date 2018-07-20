var produit = Vue.component("produit",{
	template:"#tpl-produit",
	data:function(){
		return {
			produits:[],
			categories:[],
			rech:"",
			id_cat:"",
			mode:1,
		}
	},
	computed:{
		produitsFiltre:function(){
			var produits = _.orderBy(this.produits,['nom','prenom'],['asc','asc']);
			if(this.id_cat != ""){
				var tmpProduits = [];
				for(var i=0; i<produits.length; i++){
					if(produits[i].id_cat == this.id_cat) tmpProduits.push(produits[i]);
				}
				produits = tmpProduits;
			}

			return produits.filter(produits=>{
				return (produits.nom.toLowerCase().indexOf(this.rech.toLowerCase()) > -1) ||
				(produits.categorie.toLowerCase().indexOf(this.rech.toLowerCase()) > -1) ||
				(produits.pu.toLowerCase().indexOf(this.rech.toLowerCase()) > -1) 
			});
		},
	},
	mounted:function(){
		this.GetProduits();
		this.GetCategories();
	},
	methods:{
		ChangerMode:function(mode, e){
			this.mode = mode;
			$("[id^='btn-mode-']").removeClass("btn-info").addClass("btn-outline-info");
			$("#btn-mode-"+mode).attr("class", "btn-mode btn btn-info ");
		},
		GetProduits:function(){
			var scope = this;
			$.ajax({
				url:"data.php?cas=produits",
				type:"POST",
				data:{},
				success:function(res){
					scope.produits = JSON.parse(res);
				},
			});
		},
		GetCategories:function(){
			var scope = this;
			$.ajax({
				url:"data.php?cas=categories",
				type:"POST",
				data:{},
				success:function(res){
					scope.categories = JSON.parse(res);
				},
			});
		},
		Supprimer:function(produit){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer le produit "+produit.nom+" ?");
			if(rep === false) return ;
			$.ajax({
				url:"data.php?cas=supprProduit",
				type:"POST",
				data:{id:produit.id},
				success:function(res){
					scope.GetProduits();
				},
			});
		},
	},
});