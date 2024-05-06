<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/style_login_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Sistema de Frequencia</title>
</head>

<body style="background: #f5f5f5;">
    <header style="height:75px;display: flex; position: absolute; top: 0; left: 0; background-color:#1b62b7;">
        <h6><img style="width: 200px; height: 50px; margin-top: 20px; margin-bottom: 20px;" src="/img/senai-logo-5.png" alt=""></h6>    
        <nav class="nav-bar">
            <a class="a-nav" href="#">Sobre</a>
            <button class="btnLogin">Login</button>
        </nav>
    </header>
    <div class="content">
        <div class="container-geral">
            <div class="container-oculto" style="margin-left: 45%; margin-top: 5%;">
                <div class="top-container" style="margin-left: 30px;align-items: center; justify-content: center;">
                    <img src="/img/senai-logo.png" alt="">
                </div>
            </div>
            <div class="paragrafo">
                <p style="font-size: 20px; margin-top: 20px; font-weight: 600; margin-left: 20%; color: #1b62b7;">Para cada desafio, uma oportunidade do SENAI.</p>
                <p style="display: inline-block; white-space: nowrap; margin-left: 20%; font-weight: 400;">Capacitamos os futuros destaques da indústria e impulsionamos os negócios de Minas com as principais tecnologias e tendências.</p>
                <p style="margin-left:20%; font-size: 25px; font-weight: 600; color: #1b62b7;">Conheça nossa atuação:</p>
            </div>
            <div class="cards-container" >
                <div class="card" style="background-color: #1b62b7; color:white;">
                    <h2 style="margin-bottom: 50px;"><img src="img/book.png" alt="" style="height: 60px; width: 60px;"></h2>
                    <h3 style="margin-bottom: 60px;">Educação</h3>
                    <p style="margin-bottom: 20px;">Somos referência em formação <br> para quem quer começar, evoluir <br>ou se especializar na indústria.</p>
                </div>
                <div class="card" style="background-color: #1b62b7; color:white;">
                    <h2 style="margin-bottom: 50px;"><img src="img/arrow-up.png" style="height: 60px; width: 60px;" alt=""></h2>
                    <h3>Desenvolvimento</h3>
                    <h3 style="margin-bottom: 20px;">Industrial</h3>
                    <p>Promovemos o desenvolvimento <br> sustentável e a competitividade da <br> indústria mineira.</p>
                </div>
                <div class="card" style="background-color: #1b62b7; color:white;">
                    <h2 style="margin-bottom: 50px;"><img src="img/lampada.png" style="height: 60px; width: 60px;" alt=""></h2>
                    <h3 style="margin-bottom: 60px;">Tecnologia e inovação</h3>
                    <p>Aceleramos o desenvolvimento<br>tecnológico para evoluir os processos,<br>gestão e os lucros da sua empresa.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="caixa-toggle-items">
        <h1 class="caixa-toggle">Clique no botão para alterar o tipo de acesso</h1>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
    </div>
    <div class="container" style="background: #ececec; width: 400px; position: relative; margin: 0 auto;">
        <span class="icone-fechar"><ion-icon name="close-outline"></ion-icon></span>
        <div class="caixa-login" style="width: 300px; margin: 0 auto;">
            <h1 class="h1-login" style="font-weight: 600; margin-bottom: 50px; color:#1b62b7;">Conta SENAI</h1>
            <form style="margin-bottom: 20px;" action="php/logar.php" method="POST">
                <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="login" required>
                    <label for="">Usuário</label>
                </div>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="senha" required>
                    <label for="">Senha</label>
                </div>
                <div>
                    <button type="submit" class="btn" style="font-weight: 500; background: #1b62b7;">Login</button>
                </div>
                <div class="login-registrar">
                    <p>Não possui uma conta SENAI?  <a href="#" class="login-link">Registrar</a></p>
                </div>
            </form>
        </div>
        <div class="caixa-login-empresarial" style="width: 300px; margin: 0 auto; display: none;">
            <h1 class="h1-login" style="font-weight: 600; margin-bottom: 50px; color:#1b62b7;">Conta Empresarial</h1>
            <form style="margin-bottom: 20px;" action="php/logar.php" method="POST">
                <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="login" required>
                    <label for="">Usuário</label>
                </div>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="senha" required>
                    <label for="">Senha</label>
                </div>
                <div>
                    <button type="submit" class="btn" style="font-weight: 500; background: #1b62b7;">Login</button>
                </div>
            </form>
        </div>
        <div class="caixa-registrar campos" style="width: 300px; margin: 0 auto; display: none;">
            <h1 class="h1-register" style="Color :#1b62b7; font-weight: 600; margin-top: 50px;">Registrar</h1>
            <form action="php/cadastrar_aluno.php" method="post" id="registroForm">
                <div class="conteudo-aluno-reg">
                    <input type="hidden" name="matricula" id="matricula">
                    <div class="input-box campos-input">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="nome" required>
                        <label for="">Nome</label>
                    </div>
                    <div class="input-box campos-input">
                        <ion-icon name="unlink-outline"></ion-icon>
                        <input type="text" name="cpf" required>
                        <label for="">CPF</label>
                    </div>
                    <div class="input-box campos-input">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">E-mail</label>
                    </div>
                    <div class="input-box campos-input">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="usuario" required>
                        <label for="">Usuario</label>
                    </div>
                    <div class="input-box campos-input" style="margin-bottom: 0;">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="senha" required>
                        <label for="">Senha</label>
                    </div>
                    <div>
                        <label for="dt_nascimento" style="float:left;">Data de Nascimento:</label>
                        <div class="input-box" style="border: none; outline: none; position:relative; top:0;">
                            <input id="dt_nascimento" type="date" name="dt_nascimento" required>
                        </div>
                    </div>
                    <div class="input-box" style="border:none;">
                        <label class="form-label" style="position: relative; float: left; margin-top: 15px; margin-right: 20px; margin-bottom: 50px;">Perfil: </label>
                        <div class="select-dropdown">
                            <select name="status" id="status">
                                <option value="Aluno">Aluno</option>
                                <option value="Ex-Aluno">Ex-Aluno</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box">
                        <ion-icon name="map-outline" style="margin-top: 5px;"></ion-icon>
                        <input type="endereco" name="endereco">
                        <label for="">Endereço</label>
                    </div>
                </div>
                <div>
                <div class="camposResponsavel" id="camposResponsavel" style="display: none; position: relative; float: left;">
                    <a href="#" class="toggle-aluno-reg" onclick="voltar()"><ion-icon style=" margin-top: 50px;width: 50px; height: 50px;" name="arrow-back-outline"></ion-icon></a>
                    <div class="input-box campos-input">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="nome_responsavel" id="nome_responsavel">
                        <label for="">Nome do Responsavel</label>
                    </div>
                    <div class="input-box campos-input">
                        <input type="text" name="cpf_responsavel" id="cpf_responsavel">
                        <label for="">CPF do Responsavel</label>
                    </div>
                    <div>
                        <label for="" style="float:left;">Data de Nascimento Do Responsavel:</label>
                        <div class="input-box" style="border: none; outline: none; position:relative; top:0;">
                            <input id="dt_nascimento_responsavel" type="date" name="dt_nascimento_responsavel">
                        </div>
                    </div>
                    <div class="input-box">
                        <ion-icon name="map-outline"></ion-icon>
                        <input type="endereco_responsavel" name="endereco_responsavel">
                        <label for="">Endereço do Responsavel</label>
                    </div>
                </div>
                </div>
                <button type="submit" class="btn">Registrar</button>
                <div class="login-registrar">
                    <p>Já possui uma conta SENAI? <a href="#" class="registrar-link">Logar</a></p>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer">
        <span class="text-light">Copyright © 2024 SENAI. Todos os direitos reservados.</span>
    </footer>
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
