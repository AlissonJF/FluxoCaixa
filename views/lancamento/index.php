


<!-- Jumbotron -->
<div id="intro" class="py-2 text-center bg-light">
        <h1 class="mb-0 h3"><?=$this->title?></h1>
      </div>
      <!-- Jumbotron -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-4 mb-5">
      <div class="container">
		<div class="border p-4 col-md-12">			
		<form name="frmLanc" id="frmLanc">
			<input type='hidden' name='hdnseq' id='hdnseq'>
			<div class="form-outline mb-4 col-md-2">
				<input type="text" id="txtvalor" name="txtvalor" class="form-control" required />
				<label class="form-label" for="txtvalor">Valor</label>
			</div>
			<div class="form-outline mb-4 col-md-8">
				<input type="text" id="txtobs" name="txtobs" class="form-control" required />
				<label class="form-label" for="txtobs">Observações</label>
			</div>

			<label class="form-label" for="txttipo">Tipo de Lançamento</label>
			<select type="text" id="txttipo" name="txttipo" class="form-select" required>
			</select>
			<br>

			<label class="form-label" for="txtfluxo">Tipo de Fluxo</label>
			<select type="text" id="txtfluxo" name="txtfluxo" class="form-select" required>
			</select>
			<br>
			
			<div id="botaocad">
				<button type="button" class="btn btn-primary mb-4" id="btnInc">
					Incluir
				</button>
			</div>
			<div id="botoesedit">
				<button type="button" id="btnSave" name="btnSave" class="btn btn-success">
					Gravar
				</button>
				<button type="button" name="btnCancel" id="btnCancel" class="btn btn-warning">
					Cancelar
				</button>
			</div>
		</form>
		</div>
		<br>
		<div>
		
			<table class="table table-hover" id="tabres">
				<thead>
					<tr>
						<th>Tipo de Lançamento</th>
						<th>Tipo de Fluxo</th>
						<th>Valor</th>
						<th>Data</th>
						<th>Obs</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="lslanc">
				</tbody>
			</table>
		</div>
		
      </div>
	  
    </main>
    <!--Main layout-->
		
		
<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Relatório</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
	  	<!-- Layout Model -->
		<main class="mt-4 mb-5">
			<div class="container">
				<div class="border p-4 col-md-12">			
				<form name="frmRel" id="frmRel">
					<input type="text" id="VarRelatorio" name="txtRelatorio" hidden="true">
					<label class="form-label" for="txtdate">Data/Período de Lançamento</label>
					<br>
					<input type="date" id="txtdate" name="txtdate">
					<input type="date" id="txtdate2" name="txtdate2">
					<br><br>
					<div id="botaocad">
						<button type="button" class="btn btn-primary mb-4" id="btnConsulta">
							Consultar
						</button>
					</div>
				</form>
				</div>
				<br>
				<div>
				
					<table class="table table-hover" id="tabres">
						<thead>
							<tr>
								<th>Data/Período de Lançamento</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody id="lsrel">
						</tbody>
					</table>
				</div>
				
			</div>
		
		</main>
		</div>
    </div>
  </div>
</div>