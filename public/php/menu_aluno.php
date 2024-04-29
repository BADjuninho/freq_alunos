<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de Frequência</title>
        <style>
      
      .btnLogin:hover {
          background: #ccc;
          color: #162938;
      }

      .btnLogin {
          
          width: 100px;
          height: 50px;
          background: transparent;
          border: 2px solid #fff;
          outline: none;
          border-radius: 6px;
          cursor: pointer;
          font-size: 1.1em;
          color: #162938;
          font-weight: 500;
          transition: .5s;
          height: 45px;
          background: #1b62b7;
          border: none;
          outline: none;
          border-radius: 6px;
          cursor: pointer;
          font-size: 1em;
          color: #fff;
          font-weight: 500;
          justify-content: end;
      }
      
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <a class="navbar-brand" href="/listar_aluno"><img src="img/senai-logo.png" alt="" style="height: 3rem; width: auto; margin-right: 40px; margin-left: 50px;">Bem vindo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" style="gap: 20px;">
            <li class="nav-item">
              <a class="nav-link" href="/enviar_arquivo?id=<?php echo $_SESSION['id_aluno']?>">Enviar Arquivo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ver_arquivos_enviados?id=<?php echo $_SESSION['id_aluno']?>">Arquivos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/formulario_solicitacao?id=<?php echo $_SESSION['id_aluno']?>">Enviar Solicitação</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/listar_solicitacoes?id=<?php echo $_SESSION['id_aluno']?>">Solicitações Enviadas</a>
            </li>
          </ul>
        </div>
        <div style="display: flex; align-items: center; border: 3px solid #ccc; border-radius: 7px; margin-top:5px;">
          <img src="img/profile.png" alt="" style="width: 30px; height: 30px; border-radius: 50%; margin: 0 10px;">
          <div style="display: flex; flex-direction: column; padding: 7px;">
              <p style="font-weight: 500; color: #162938; margin: 0;"><?php echo $_SESSION['nome_usuario']; ?></p>
          </div>
        </div>
        <form action="php/deslogar.php" method="post" style="margin-left: 15px; margin-right: 15px;">
            <button type="submit" class="btnLogin" style="margin-top: 5px;">Sair</button>
        </form>
    </nav>
    </body>

</html>
