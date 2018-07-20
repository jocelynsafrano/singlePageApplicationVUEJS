var clientFiche = Vue.component("clientFiche",{
	template:"#tpl-client-fiche",
	data:function(){
		return {
			mode:0,
			id:0,
			client:{
				id:0,
				nom:"",
				prenom:"",
				email:"",
			},
		}
	},
	mounted:function(){
		this.id = this.$route.params.clientId;
		this.mode = (this.id == 0)? 1 : 2;
		if(this.mode == 2) this.GetClient();
	},
	methods:{
		GetClient:function(){
			var scope = this;
			$.ajax({
				url:"data.php?cas=clientId",
				type:"POST",
				data:{id:scope.id},
				success:function(res){
					scope.client = JSON.parse(res);
				},
			});
		},
		Enregistrer:function(){
			var scope = this;
			$.ajax({
				url:"data.php?cas=clientSave",
				type:"POST",
				data:{id: scope.id, client:scope.client},
				success:function(){
					scope.$router.push("/client");
				}
			})
		},
	},
});