


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
		<form name="frmTipLanc" id="frmTipLanc">					
			<input type="hidden" id="txtseq" name="txtseq">
			<div class="form-outline mb-4 col-md-8">
				<input type="text" id="txtdesc" name="txtdesc" class="form-control" required />
				<label class="form-label" for="txtdesc">Descrição</label>
			</div>
			
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
						<th>Descrição</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="lstiplanc">
				</tbody>
			</table>
		</div>
		
      </div>
	  
    </main>
    <!--Main layout-->
		
		

