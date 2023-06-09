<?php

include $_SERVER['DOCUMENT_ROOT'] . ('/ProjetoIntegrador/Config/Protect.php');

if (isset($_POST['usuario'])) {
	include $_SERVER['DOCUMENT_ROOT'] . ('/ProjetoIntegrador/Config/Conexao.php');

	$nome_funcionario = $_POST['nome_funcionario'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : array(); // Verifica se algum cargo foi selecionado
	$telefone = $_POST['telefone'];
	$disponibilidade = isset($_POST['disponibilidade']) ? $_POST['disponibilidade'] : array(); // Verifica se alguma disponibilidade foi selecionada
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

	// Converte os arrays de cargos e disponibilidade em strings separadas por vírgula
	$cargosString = implode(", ", $cargo);
	$cargosString = mysqli_real_escape_string($mysqli, $cargosString); // Escapa a string antes de inserir

	$diasString = implode(", ", $disponibilidade);
	$diasString = mysqli_real_escape_string($mysqli, $diasString); // Escapa a string antes de inserir

	// Insere os dados no banco de dados
	$sql = "INSERT INTO funcionarios (id_funcionarios, nome_funcionario, email, usuario, cargo, telefone, disponibilidade, senha) 
            VALUES (NULL, '$nome_funcionario', '$email', '$usuario', '$cargosString', '$telefone', '$diasString', '$senha')";

	if ($mysqli->query($sql) === TRUE) {
		header('Location: /ProjetoIntegrador/CadastroProfissional.php');
		exit();
	} else {
		echo "Erro ao inserir valor: " . $mysqli->error;
	}
}

include $_SERVER['DOCUMENT_ROOT'] . ('/ProjetoIntegrador/Config/Conexao.php');

// Consulta para buscar os cursos do banco de dados
$sqlCursos = "SELECT * FROM cursos";
$resultadoCursos = $mysqli->query($sqlCursos);

// Consulta para buscar as disciplinas do banco de dados
$sqlDisciplinas = "SELECT * FROM disciplinas";
$resultadoDisciplinas = $mysqli->query($sqlDisciplinas);


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/ProjetoIntegrador/Styles/styleCadastroProfissional.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<title>Cadastro Profissional</title>
	<style>
		.span-required {
			top: 95%;
			left: 6px;
			font-size: 19px;
			margin: 3px 0 0 1px;
			color: red;
			display: none;
			border: bold;
			position: absolute;
		}
	</style>

</head>

<body>


	<nav class="menu-nav">

		<div class="menuToggle">
			<a href="Home.php">
				<img src="img/logo2.png">
			</a>
		</div>


		<!--<ul class="cabeçalho-link">
					<li><a href="#infantil">Home</a></li>
				</ul>cabeçalho-link-->

		<div class="perfil">
			<h3>
				<?php echo $_SESSION['nome_funcionario'] ?> <br><span>
					<?php echo $_SESSION['cargo'] ?>
				</span>
			</h3>
			<div class="imgCx">
				<img src="img/unnamed.png" alt="...">
			</div>
		</div>
		<div class="menu">
			<ul>
				<li>
					<a href="">
						<ion-icon name="person-outline"></ion-icon>
						Perfil
					</a>
				</li>
				<li>
					<a href="">
						<ion-icon name="chatbubble-outline"></ion-icon>
						Cx. de Entrada
					</a>
				</li>
				<li>
					<a href="">
						<ion-icon name="settings-outline"></ion-icon>
						Configurações
					</a>
				</li>
				<li>
					<a href="">
						<ion-icon name="settings-outline"></ion-icon>
						Ajuda
					</a>
				</li>
				<li>
					<a href="/ProjetoIntegrador/Config/Logout.php">
						<ion-icon name="log-out-outline"></ion-icon>
						Deslogar
					</a>
				</li>
			</ul>
		</div>

	</nav><!--NAV-->

	<div class="background">

		<form action="" method="post">
			<div class="main-login">
				<div class="login">
					<div class="card-login">

						<div class="titulo">
							<h1>Cadastrar Profissional</h1>
						</div>


						<div class="textfield">
							<input type="text" name="nome_funcionario" placeholder="Digite o nome completo"
								class="inputs required " autofocus>
							<span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
						</div>

						<div class="textfield">
							<input type="text" name="usuario" id="usuario" placeholder="Digite o nome de usuario"
								class="inputs required " autofocus>
							<span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
						</div>


						<div class="textfield">
							<input type="email" name="email" id="email" placeholder="Digite um email"
								class="inputs required ">
							<span class="span-required">Digite um email válido</span>
						</div>

						<div class="textfield">
							<input type="celular" name="telefone" placeholder="Digite um número de celular"
								class="inputs required " required>
							<span class="span-required">Digite um celular válido</span>
						</div>



						<div class="select-area">
							<div class="container">
								<!-- Select do cargo -->
								<div class="select-btn" data-name="Cargo">
									<span class="btn-text">Selecione o cargo</span>
									<span class="arrow-dwn">
										<i class="fa-solid fa-chevron-down"></i>
									</span>
								</div>
								<div class="checkboxes">
									<div class="checkbox-item">
										<span class="checkbox">
											<input type="checkbox" id="cargo-professor" name="cargo[]"
												value="Professor">
											<i class="fa-solid fa-check check-icon"></i>
										</span>
										<span class="item-text">Professor</span>
									</div>
									<div class="checkbox-item">
										<span class="checkbox">
											<input type="checkbox" id="cargo-coordenador" name="cargo[]"
												value="Coordenador">
											<i class="fa-solid fa-check check-icon"></i>
										</span>
										<span class="item-text">Coordenador</span>
									</div>
								</div>
							</div>


							<div class="container">
								<!-- Select do curso -->
								<div class="select-btn" data-name="Curso">
									<span class="btn-text">Selecione o curso</span>
									<span class="arrow-dwn">
										<i class="fa-solid fa-chevron-down"></i>
									</span>
								</div>
								<ul class="list-items">
									<?php
									include $_SERVER['DOCUMENT_ROOT'] . ('/ProjetoIntegrador/Config/Conexao.php');
									while ($rowCurso = $resultadoCursos->fetch_assoc()) {
										$idCurso = $rowCurso['id_cursos'];
										$nomeCurso = $rowCurso['nome_curso'];
										?>
										<li class="item">
											<span class="checkbox" name="curso">
												<i class="fa-solid fa-check check-icon"></i>
											</span>
											<span class="item-text">
												<?php echo $nomeCurso; ?>
											</span>
											<input type="hidden" name="curso[]" value="<?php echo $idCurso; ?>">
										</li>
										<?php
									}
									?>
								</ul>
							</div>

							<div class="container">
								<!-- Select do curso -->
								<div class="select-btn" data-name="Disciplina">
									<span class="btn-text">Selecione a disciplina</span>
									<span class="arrow-dwn">
										<i class="fa-solid fa-chevron-down"></i>
									</span>
								</div>
								<ul class="list-items">
									<?php
									include $_SERVER['DOCUMENT_ROOT'] . ('/ProjetoIntegrador/Config/Conexao.php');
									while ($rowDisciplina = $resultadoDisciplinas->fetch_assoc()) {
										$idDisciplina = $rowDisciplina['id_disciplinas'];
										$nomeDisciplina = $rowDisciplina['nome_disciplina'];
										?>
										<li class="item">
											<span class="checkbox" name="disciplina">
												<i class="fa-solid fa-check check-icon"></i>
											</span>
											<span class="item-text">
												<?php echo $nomeDisciplina; ?>
											</span>
											<input type="hidden" name="disciplina[]" value="<?php echo $idDisciplina; ?>">
										</li>
										<?php
									}
									?>
								</ul>
							</div>
						</div>
						<!-- Fim do select-area -->

						<div class="checkbox-semana">
							<label for="disponibilidade">Disponibilidade:</label>

							<div class="semana">
								<input type="checkbox" name="disponibilidade[]" id="segunda" value="Segunda">
								<label for="segunda">Segunda-feira</label>
							</div>

							<div class="semana">
								<input type="checkbox" name="disponibilidade[]" id="terca" value="Terça">
								<label for="terca">Terça-feira</label>
							</div>

							<div class="semana">
								<input type="checkbox" name="disponibilidade[]" id="quarta" value="Quarta">
								<label for="quarta">Quarta-feira</label>
							</div>

							<div class="semana">
								<input type="checkbox" name="disponibilidade[]" id="quinta" value="Quinta">
								<label for="quinta">Quinta-feira</label>
							</div>

							<div class="semana">
								<input type="checkbox" name="disponibilidade[]" id="sexta" value="Sexta">
								<label for="sexta">Sexta-feira</label>
							</div>

							<div class="semana">
								<input type="checkbox" name="disponibilidade[]" id="sabado" value="Sabado">
								<label for="sabado">Sábado</label>
							</div>
						</div>

						<div class="textfield">
							<input type="password" name="senha" id="password" placeholder="Senha"
								class="inputs required">
							<div class="icon" id="icon" onclick="showHide()"></div>
							<span class="span-required">Digite uma senha com no mínimo 8 caracteres</span>
						</div>

						<div class="textfield">
							<input type="password" id="passwordSecond" placeholder="Repita a senha"
								class="inputs  required">
							<div class="icon" id="icon2" onclick="showHideSecond()"></div>
							<span class="span-required">Senhas devem ser compatíveis</span>
						</div>
						<button class="btn-login" type="submit">Cadastrar</button>

					</div>
				</div>
		</form>
	</div>




	</div>

	<script>
		const selectBtns = document.querySelectorAll(".select-btn");

		selectBtns.forEach((selectBtn) => {
			const listItems = selectBtn.nextElementSibling;
			const items = selectBtn.nextElementSibling.querySelectorAll(".item");
			const btnText = selectBtn.querySelector(".btn-text");
			const selectName = selectBtn.getAttribute("data-name");
			const itemName = selectBtn.getAttribute("data-name");

			selectBtn.addEventListener("click", () => {
				selectBtn.classList.toggle("open");
			});

			items.forEach((item) => {
				item.addEventListener("click", () => {
					item.classList.toggle("checked");

					const checkedItems = selectBtn.nextElementSibling.querySelectorAll(".checked");
					const selectedItemsText = Array.from(checkedItems).map((checkedItem) => {
						return checkedItem.querySelector(".item-text").textContent;
					});

					if (checkedItems.length === 1) {
						if (itemName === "Disciplina") {
							btnText.innerText = `1 ${itemName} selecionada: ${selectedItemsText.join(", ")}`;
						} else {
							btnText.innerText = `1 ${itemName} selecionado: ${selectedItemsText.join(", ")}`;
						}
					} else if (checkedItems.length > 0) {
						if (selectedItemsText.join(", ").length > 20) {
							const pluralForm = selectName === "Disciplina" ? "selecionadas" : "selecionados";
							btnText.innerText = `${checkedItems.length} ${itemName}${checkedItems.length === 1 ? "" : "s"} ${pluralForm}`;
						} else {
							if (selectName === "Disciplina") {
								btnText.innerText = `${checkedItems.length} ${itemName}s selecionadas: ${selectedItemsText.join(", ")}`;
							} else {
								btnText.innerText = `${checkedItems.length} ${itemName}s selecionados: ${selectedItemsText.join(", ")}`;
							}
						}
					} else {
						if (selectName === "Disciplina") {
							btnText.innerText = `Selecione a ${itemName}`;
						} else {
							btnText.innerText = `Selecione o ${itemName}`;
						}
					}
				});
			});
		});




	</script>

	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="/ProjetoIntegrador/Scripts/script.js"></script>
	<!-- <script src="/ProjetoIntegrador/Scripts/scriptCadastro.js"></script> -->
	<script src="/ProjetoIntegrador/Scripts/scriptPerfil.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>