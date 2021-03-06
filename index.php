<?php 
	$acao = 'TarefasPendentes';
	require "tarefa_Controle.php";
 ?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<style type="text/css">
			body{
				background: #bbdefb;
			}
		</style>

		<script>
			function Editar(id, txt_tarefa){
				// CRIAR UM FORMULARIO DE EDIÇÃO
				let formulario = document.createElement('form');
				formulario.action = 'index.php?pagina=index&acao=atualizar';
				formulario.method = 'post';
				formulario.className = 'row';

				// CRIAR UM CAMPO PARA ENTRADA DE TEXTO
				let inputTarefa = document.createElement('input');
				inputTarefa.type = 'text';
				inputTarefa.name = 'tarefa';
				inputTarefa.className = 'col-9 form-control';
				inputTarefa.value = txt_tarefa;

				// CRIAR UM INPUT HIDDEN PARA GUARADAR O ID DA TAREFA
				let inputId = document.createElement('input');
				inputId.type = 'hidden';
				inputId.name = 'id';
				inputId.value = id;


				// CRIAR UM BOTAO PARA ENVIAR O FORMULARIO
				let botao = document.createElement('button');
				botao.type = 'submit';
				botao.className = 'col-3 btn btn-info';
				botao.innerHTML = ' Atualizar ';

				// INCLUIR NO FORMULARIO OS ELEMENTOS: BOTAO E CAMPO DE ENTRADA
				formulario.appendChild(inputTarefa);
				formulario.appendChild(inputId);
				formulario.appendChild(botao);

				// SELECIONAR A DIV TAREFA
				let tarefa = document.getElementById('tarefa_'+id);

				// LIMPAR O TEXTO DO FORMULARIO PARA INCLUIR DO FORMULARIO
				tarefa.innerHTML = '';

				//INCLUIR FORMULARIO NA PAGINA
				tarefa.insertBefore(formulario, tarefa[0]);
			}
			function Apagar(id){
				location.href = 'index.php?pagina=index&acao=apagar&id='+id;
			}
			function MarcarConcluida(id){
				location.href = 'index.php?pagina=index&acao=MarcarConcluida&id='+id;
				
			}
		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />
									<?php foreach ($tarefas as $indice => $tarefa) {  ?>

									<div class="row mb-3 d-flex align-items-center tarefa">

										<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?php echo $tarefa->tarefa ?> 
										</div>

									<div class="col-sm-3 mt-2 d-flex justify-content-between">
									<i class="fas fa-trash-alt fa-lg text-danger" onclick="Apagar(<?= $tarefa->id ?>)"></i>
									<i class="fas fa-edit fa-lg text-info" onclick="Editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
									<i class="fas fa-check-square fa-lg text-success" onclick="MarcarConcluida(<?= $tarefa->id ?>)"></i>
								</div>
									</div>

								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>