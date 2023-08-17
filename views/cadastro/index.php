
		<h1><center>Identificação do Usuário</center></h1>
		<form name="frmCadastro" id="frmCadastro" method="post" role="form" action="">
			<div class="container">
				<div class="row">
					<div class="form-group col-md-2 col-lg-3">
						<br>
						<label>ID de Usuário:</label>
						<input type="text" class="form-control" id="txtid" name="txtid">
					</div>
					<?php if ($_SESSION['nivel'] == 2) { ?>
						<div class="form-group col-md-2 col-lg-3">
							<br>
							<label>Nome:</label>
							<input type="text" class="form-control" id="txtnome" name="txtnome">
						</div>
					<?php } ?>
					<div class="form-group col-md-2 col-lg-3">
						<br>
						<label>Senha:</label>
						<input type="password" class="form-control" id="txtsenha" name="txtsenha" maxlength="10">
					</div>
					<div class="form-group col-md-2 col-lg-3">
						<br>
						<label>Nível de Acesso:</label>
						<input type="text" class="form-control" id="txtnivel" name="txtnivel">
					</div>
				</div>
				<br>
				<button type="submit" id="btnCadastro" name="btnCadastro" class="btn btn-dark">Cadastrar</button>
			</div>
		</form>

