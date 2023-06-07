<?php   

include  $_SERVER['DOCUMENT_ROOT'] .  ("/ProjetoIntegrador/Config/Conexao.php");

include  $_SERVER['DOCUMENT_ROOT'] . ("/ProjetoIntegrador/Config/Protect.php");



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/ProjetoIntegrador/Styles/styleHome.css">

	<title>Página Inicial</title>
</head>
<body>

		<nav class="menu-nav">

			<div class="menuToggle">
					<a href="Home.php" >
						<img src="img/logo2.png">
					</a>
			</div>

				
				<!--<ul class="cabeçalho-link">
					<li><a href="#infantil">Home</a></li>
				</ul>cabeçalho-link-->
					
			<div class="perfil">
				<h3> <?php echo $_SESSION['nome_funcionario'] ?> <br><span> <?php echo $_SESSION['cargo'] ?> </span></h3>
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

	

		<div class="container">
            <div class="overlay">Ferramentas</div>
				<div class="card">
					<div class="card__img"><a href="CadastroProfissional.php">
					<img src ="img/CadastrarProfissional.jpg"></div>
				 	<div class="cardText">
					 <h3><a href="CadastroProfissional.php" class="card__link">Cadastrar Profissional</a></h3>
					</div>
				</div>
				<div class="card">
					<div class="card__img"><a href="CadastroCurso.php">
					<img src ="img/CadastrarCurso.jpg"></div>
				 	<div class="cardText">
					 <h3><a href="CadastroCurso.php" class="card__link">Cadastrar Curso</a></h3>
					</div>
				</div>
				<div class="card">
					<div class="card__img"><a href="CadastroDisciplina.php">
					<img src ="https://img.freepik.com/vetores-premium/ilustracao-em-vetor-conceito-abstrato-de-regulamentos-de-voo-de-drone_107173-25447.jpg"></div>
				 	<div class="cardText">
					 <h3><a href="CadastroDisciplina.php" class="card__link">Cadastrar Disciplina</a></h3>
					</div>
				</div>
				<div class="card">
					<div class="card__img"><a href="Editar.php">
					<img src ="https://img.freepik.com/vetores-premium/designer-grafico-trabalhando-animacao-de-artista-fazendo-movimento-de-video-de-imagem-trabalho-de-animador-em-tablet-maos-criativas-desenhando-na-tela-cena-de-vetor-total_53562-19636.jpg?w=1380"></div>
				 	<div class="cardText">
					 <h3><a href="CadastroEditar.php" class="card__link">Editar</a></h3>
					</div>
				</div>
				
    
    	</div>



	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<script src="/ProjetoIntegrador/Scripts/scriptPerfil.js"></script>
</body>
</html>
