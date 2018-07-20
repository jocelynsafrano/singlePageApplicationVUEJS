var client = Vue.component("client",{
	template:"#tpl-client",
	data:function(){
		return {
			clients:[],
			rech:"",
		}
	},
	computed:{
		clientsFiltre:function(){
			var clients = _.orderBy(this.clients,['nom','prenom'],['asc','asc']);
			return clients.filter(clients=>{
				return (clients.nom.toLowerCase().indexOf(this.rech.toLowerCase()) > -1) ||
				(clients.prenom.toLowerCase().indexOf(this.rech.toLowerCase()) > -1) ||
				(clients.email.toLowerCase().indexOf(this.rech.toLowerCase()) > -1) 
			});
		},
	},
	mounted:function(){
		this.GetClients();
	},
	methods:{
		GetClients:function(){
			var scope = this;
			$.ajax({
				url:"data.php?cas=clients",
				type:"POST",
				data:{},
				success:function(res){
					scope.clients = JSON.parse(res);
				},
			});
		},
		Supprimer:function(client){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer le client "+client.prenom+" "+client.nom+"?");
			if(rep === false) return ;
			$.ajax({
				url:"data.php?cas=clientSuppr",
				type:"POST",
				data:{id:client.id},
				success:function(res){
					scope.GetClients();
				},
			});
		},
	},
});