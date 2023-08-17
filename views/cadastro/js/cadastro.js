$(document).ready(function(){
	$("#btnCadastro").click(function(e){
		e.preventDefault();
		axios.post(BASEURL+"/cadastro/ver/",$("#frmCadastro").serialize())
		.then((result) => {
			if(result.data=="OK"){
				window.location=BASEURL+'index/';
			}
			else{
				alert(result.data);
			}
		});
	});
});