$(document).ready(function(){
	$("#btnLogin").click(function(e){
		e.preventDefault();
		axios.post(BASEURL+"/login/ver/",$("#frmLogin").serialize())
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