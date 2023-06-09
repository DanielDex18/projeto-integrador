<?php

include $_SERVER['DOCUMENT_ROOT'] . ('/ProjetoIntegrador/Config/Protect.php');


if(isset($_POST['usuario'])){

    include $_SERVER['DOCUMENT_ROOT'] . ('/ProjetoIntegrador/Config/Conexao.php');

	
    $nome_disciplinas= $_POST['nome_disciplinas'];
    

    $mysqli->query("INSERT INTO disciplinas (id_disciplinas, nome_disciplinas) 
	VALUES (NULL,'$nome_disciplinas');");

    // Consulta para obter a lista de professores
$sql_query = "SELECT * FROM funcionarios WHERE cargo = 'Professor'";
$result = $mysqli->query($sql_query);

// Verifica se há algum erro na consulta
if (!$result) {
    die("Erro ao consultar os professores: " . $mysqli->error);
}

// Array para armazenar os professores disponíveis
$professores = [];

// Percorre os resultados da consulta
while ($row = $result->fetch_assoc()) {
    $professores[$row['id_funcionarios']] = $row['nome_funcionario'];
}

// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {
    // Dados do formulário
    $disciplina = $_POST['disciplina'];
    $professor = $_POST['professor'];

    // Insere os dados na tabela de disciplinas
    $insert_query = "INSERT INTO disciplinas (disciplina, professor) VALUES ('$disciplina', '$professor')";
    if ($mysqli->query($insert_query)) {
        echo "Disciplina cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar disciplina: " . $mysqli->error;
    }
}

	header('Location: /ProjetoIntegrador/CadastroProfissional.php');
	exit();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ProjetoIntegrador/Styles/styleCadastroDisciplina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Cadastro Disciplina</title>
    <style>
        .span-required{
            top: 95%;
            left:6px;
            font-size: 15px;
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
            <a href="">
                <ion-icon name="log-out-outline"></ion-icon>
                Deslogar
            </a>
        </li>
    </ul>
</div>
    
</nav><!--NAV-->





   

   <div class="background">   

<form action="" method="POST" id="form">            
    <div class="main-login">
        <div class="login">
            <div class="card-login">

            <div class="titulo">
                <h1>Cadastrar Disciplina</h1>
            </div>


            <div class="textfield">
                    <input type="text" name="nome_Disciplina" placeholder="Digite o nome da disciplina" class="inputs required "
                        oninput="nameValidate()" autofocus>
                    <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
                </div>


                



                <div class="select-area">
                    <div class="container">
                        <!-- Select do cargo -->
                        <div class="select-btn" data-name="Professor">
                            <span class="btn-text">Selecione o Professor</span>
                            <span class="arrow-dwn">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                        <ul class="list-items">
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Pedro</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">João</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Maria</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Fernando</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Juliana</span>
                            </li>
                        </ul>
                    </div>

                    <div class="container">
                        <!-- Select do cargo -->
                        <div class="select-btn" data-name="Local">
                            <span class="btn-text">Selecione o local</span>
                            <span class="arrow-dwn">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                        <ul class="list-items">
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Sala 1</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Sala 2</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Sala 3</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Laboratório 1</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Laboratório 2</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">Laboratório 3</span>
                            </li>
                        </ul>
                    </div>


                    <div class="container">
                        <!-- Select do cargo -->
                        <div class="select-btn" data-name="Horário">
                            <span class="btn-text">Selecione o horário</span>
                            <span class="arrow-dwn">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                        <ul class="list-items">
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">19:00 as 20:50</span>
                            </li>
                            <li class="item">
                                <span class="checkbox">
                                    <i class="fa-solid fa-check check-icon"></i>
                                </span>
                                <span class="item-text">20:50 as 22:30</span>
                            </li>
                        </ul>
                    </div>

                    
                    <!-- Fim do select-area -->
                </div>


                

                <div class="textfield">
						<input type="celular" name="carga-horaria" placeholder="Digite a carga horária"
							class="inputs required " required>
					</div>

                <button class="btn-login" type="submit" onclick="isFormValid()">Cadastrar</button>
            </div>
        </div>
    </div>
</form>

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
						if (selectedItemsText.join(", ").length > 30) { 
							const pluralForm = selectName === "Professor" ? "selecionados" : "selecionados";
							btnText.innerText = `${checkedItems.length} ${itemName}${checkedItems.length === 1 ? "" : "es"} ${pluralForm}`;
						} else {
							if (selectName === "Professor") {
								btnText.innerText = `${checkedItems.length} ${itemName}es selecionados: ${selectedItemsText.join(", ")}`;
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


    <script src="/ProjetoIntegrador/Scripts/script.js"></script>
    <script src="/ProjetoIntegrador/Scripts/scriptPerfil.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>