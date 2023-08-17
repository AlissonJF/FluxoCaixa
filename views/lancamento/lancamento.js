function loadData(id){
	getUrl(`${BASEURL}/lancamento/loadData/${id}`)
	.then(res=>{	   
	    if(res.data.length>0){
			document.querySelector("#hdnseq").value=res.data[0].sequencia;
			var txtvalor=document.querySelector("#txtvalor");
			var txtobs=document.querySelector("#txtobs");
			var txttipo=document.querySelector("#txttipo");
			var txtfluxo=document.querySelector("#txtfluxo");
				txtvalor.value=res.data[0].valor;
				txtvalor.dispatchEvent(new Event('change'));
				txtobs.value=res.data[0].obs;
				txttipo.value=res.data[0].tipo;
				txttipo.dispatchEvent(new Event('change'));
				txtfluxo.value=res.data[0].fluxo;
				activateLabel(document.querySelector("label[for='txtvalor']"));
				activateLabel(document.querySelector("label[for='txtobs']"));
				
				showEdit();
		}
	});
}

function loadDataRel(id) {
	getUrl(`${BASEURL}/lancamento/loadDataRel/${id}`)
	.then(res=>{
		if (res.data.length>0){
			document.querySelector("#txtdate");
			document.querySelector("#txtdate2");
		}
	});
}

function getTipLanc() {

	getUrl(BASEURL+"/lancamento/v1").then(res => {

		var txt="<option selected disabled>Selecione o Tipo</option>";

		res.data.forEach(element => {
			txt+=`<option value="${element.tipo}">${element.tipodesc}</option>`;
		});
		document.querySelector("#txttipo").innerHTML=txt;
	});
	
} getTipLanc();

function getTipFluxo() {

	getUrl(BASEURL+"/lancamento/v2").then(res => {

		var txt="<option value='' selected disabled>Selecione o Tipo</option>";

		res.data.forEach(element => {
			txt+=`<option value="${element.fluxo}">${element.fluxodesc}</option>`;
		});
		document.querySelector("#txtfluxo").innerHTML=txt;
	});
	
} getTipFluxo();

function delData(id){
	if(confirm("Confirma a Exclusão do Registro?")){
		var params={id: id};
		deleteItem(`${BASEURL}/lancamento/del`,params)
		.then(res=>{
			alert(res.data.texto);
			if(res.data.sequencia=="1"){
				listaLanc();
			}		 
		});
	}
}

function listaLanc(){

	document.querySelector("#lslanc");
	getUrl(BASEURL+"/lancamento/listaLanc")
	   .then(res=>{	   
			var txt="";
			for(var i=0;i<res.data.length;i++){
				var reg=res.data[i];
				var bRel=`<a href='javascript:void(0);' id='btnRel' onclick='addRel(${reg.sequencia})'><i class="fas fa-scroll"></i>`
				var bEdit=`<a href='javascript:void(0)' onclick='loadData(${reg.sequencia});'><i class="fas fa-edit"></i></a>`;
				var bDel=`<a href='javascript:void(0)' onclick='delData(${reg.sequencia});'><i class="fas fa-trash"></i></a>`;
				txt+=`<tr>
						<td>${reg.tipodesc}</td>
						<td>${reg.fluxodesc}</td>
						<td>R$${reg.valor}</td>
						<td>${reg.data}</td>
						<td>${reg.obs}</td>
						<td>${bEdit} -- ${bDel} -- ${bRel}</td>
					  </tr>`;
			}
		    document.querySelector("#lslanc").innerHTML=txt;
	});
}

function listaRel(sequencia)
{

	if (sequencia) {

		document.querySelector("#VarRelatorio").value=sequencia;
		visualrelatorio = sequencia;
	}

}

function addRel(sequencia)
{
	const myModalEl = document.getElementById('exampleModal')
	const modal = new mdb.Modal(myModalEl)
	axios.post(`${BASEURL}/login/verificaPermissao`).then(res=>{
		if(res.data == 1 || res.data == 2) {
			if (sequencia) {
				listaRel(sequencia);
			} modal.show();
		} else {
			alert ("Acesso não permitido!");
		}
	});

}

function reset(){
	document.querySelector("#frmLanc").reset();
	document.querySelector("#txtseq");
	hideEdit();
  }

document.addEventListener("DOMContentLoaded",()=>{

	reset();
	listaLanc();

	document.querySelector("#btnInc").addEventListener("click",function(){             
		let form = document.querySelector("#frmLanc");
		postForm(`${BASEURL}/lancamento/addLanc`,form).then(res=>{
		   alert(res.data.texto);
		   if(res.data.sequencia=="1"){
			   reset();
			   listaLanc();
		   }
		})
	});

	document.querySelector("#btnSave").addEventListener("click",function(){             
		let form = document.querySelector("#frmLanc");
		postForm(`${BASEURL}/lancamento/save`,form).then(res=>{
			alert(res.data.texto);
			if(res.data.sequencia=="1"){
			reset();
			listaLanc();
			}		 
		});
	});

	document.querySelector("#btnCancel").addEventListener("click",function(){
		reset();
	});
	

});

function resetRel(){
	document.querySelector("frmRel").resetRel();
	document.querySelector("#txtdate").readOnly=false;
	hideEdit();
}

document.addEventListener("DOMContentLoaded",()=>{

	document.querySelector("#btnConsulta").addEventListener("click",function(){
		let form = document.querySelector("#frmRel");
		postForm(`${BASEURL}/lancamento/busca`,form).then(res=>{
			var txt="";
			for (var i=0;i<res.data.length;i++){
				var reg=res.data[i];
				txt+=`<tr>
						<td>${reg.dataRel}</td>
						<td>${reg.valorRel}</td>
					  </tr>`;
			} txt+=`<tr>
						<td></td>
						<td>${res.data[0].total}</td>
					</tr>`;
			document.querySelector("#lsrel").innerHTML=txt;
		});
	});

});