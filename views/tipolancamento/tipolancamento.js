function loadData(id) {
    getUrl(`${BASEURL}/tipolancamento/loadData/${id}`)
        .then(res => {
            if (res.data.length > 0) {
                document.querySelector("#txtseq").value = res.data[0].sequencia;
                document.querySelector("#txtdesc").value = res.data[0].descricao;
                activateLabel(document.querySelector("label[for='txtdesc']"));

                showEdit();
            }
        });
}

function delData(id) {
    if (confirm("Confirma a Exclusão do Registro?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/tipolancamento/del`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.sequencia == "1") {
                    listaTipLanc();
                }
            });
    }
}

function listaTipLanc() {

    document.querySelector("#lstiplanc");
    getUrl(BASEURL + "/tipolancamento/listaTipLanc")
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var bEdit = `<a href='javascript:void(0)' onclick='loadData(${reg.sequencia});'><i class="fas fa-edit"></i></a>`;
                var bDel = `<a href='javascript:void(0)' onclick='delData(${reg.sequencia});'><i class="fas fa-trash"></i></a>`;
                txt += `<tr>
						<td>${reg.descricao}</td>
						<td>${bEdit} ${bDel}</td>
					  </tr>`;
            }
            document.querySelector("#lstiplanc").innerHTML = txt;
        });
}

function reset() {
    document.querySelector("#frmTipLanc").reset();
    document.querySelector("#txtseq").readOnly = false;
    hideEdit();
}

document.addEventListener("DOMContentLoaded", () => {

    reset();
    listaTipLanc();
    document.querySelector("#btnInc").addEventListener("click", function() {
        let form = document.querySelector("#frmTipLanc");
        postForm(`${BASEURL}/tipolancamento/addTipLanc`, form).then(res => {
            alert(res.data.texto);
            if (res.data.sequencia == "1") {
                reset();
                listaTipLanc();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", function() {
        let form = document.querySelector("#frmTipLanc");
        postForm(`${BASEURL}/tipolancamento/save`, form).then(res => {
            alert(res.data.texto);
            if (res.data.sequencia == "1") {
                reset();
                listaTipLanc();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", function() {
        reset();
    });


});