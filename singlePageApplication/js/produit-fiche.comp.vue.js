var produitFiche = Vue.component("produitFiche",{
	template:"#tpl-produit-fiche",
	data:function(){
		return {
			mode:0,
			id:0,
			produit:{
				id:0,
				nom:"",
				id_cat:"",
				pu:0,
				
			},
			categories:[],
		}
	},
	mounted:function(){
		this.GetCategories();
		this.id = this.$route.params.produitId;
		this.mode = (this.id == 0)? 1 : 2;
		if(this.mode == 2) this.GetProduit();
	},
	methods:{
		GetProduit:function(){
			var scope = this;
			$.ajax({
				url:"data.php?cas=produitId",
				type:"POST",
				data:{id:scope.id},
				success:function(res){
					scope.produit = JSON.parse(res);
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
		Enregistrer:function(){
			var scope = this;
			$.ajax({
				url:"data.php?cas=produitSave",
				type:"POST",
				data:{id: scope.id, produit:scope.produit},
				success:function(){
					scope.$router.push("/produit");
				}
			})
		},
	},
});