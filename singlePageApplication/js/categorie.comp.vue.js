var categorie = Vue.component("categorie",{
	template:"#tpl-categorie",
	data:function(){
		return{
			categories:[],
			rech:"",
		}
	},
	computed:{
		categoriesFiltre:function(){
			var categories = _.orderBy(this.categories,['nom'],['asc']);
			return categories.filter(categories=>{
				return (categories.nom.toLowerCase().indexOf(this.rech.toLowerCase()) > -1) 
			});
		},
	},
	mounted:function(){
		this.GetCategories();
	},
	methods:{
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
		Ajouter:function(){
			var scope = this;
			var rep = prompt("Saisir une nouvelle catégorie ?");
			if(rep != null && rep.trim().length > 0){
				$.ajax({
					url:"data.php?cas=addCat",
					type:"POST",
					data:{nom:rep},
					success:function(res){
						scope.GetCategories();
					},
				});
			}
		},
		Modifier:function(cat){
			var scope = this;
			var rep = prompt("Modifier la catégorie : "+ cat.nom, cat.nom);
			if(rep != null && rep.trim().length > 0){
				cat.nom = rep;
				$.ajax({
					url:"data.php?cas=modifCat",
					type:"POST",
					data:{cat:cat},
					success:function(res){
						scope.GetCategories();
					},
				});
			}
		},
		Supprimer:function(cat){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer la catégorie "+cat.nom+" ?");
			if(rep === false) return ;
			$.ajax({
				url:"data.php?cas=supprCat",
				type:"POST",
				data:{id:cat.id},
				success:function(res){
					scope.GetCategories();
				},
			});
		},
	},
});