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
      
      .navbar-collapse {
          overflow-x: auto;
          white-space: nowrap;
      }

      @media (max-width: 400px) {
          .navbar-collapse {
              display: flex;
          }
          .seta-nav {
              display: inline-block;
              margin-left: auto;
              margin-right: 10px;
              width: 30px;
              height: 30px;
              background-image: url('img/seta.png');
              background-size: cover;
              cursor: pointer;
          }
      }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <a class="navbar-brand" href="#"><img src="img/senai-logo.png" alt="" style="height: 3rem; width: auto; margin-right: 40px; margin-left: 0px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" style="gap: 5px; font-size: 15px;">
            <li class="nav-item active">
              <a class="nav-link" href="/cad_user">Cadastrar Usuario</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/cad_empresa">Cadastrar Empresa</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/listar">Listar empresas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/listar_usuarios">Listar Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/listar_alunos_gerente">Listar Alunos</a>
            </li>
            <li>
              <a class="nav-link" href="/vinc_usuario">Vincular Usuario a Empresa</a>
            </li>
            <li>
              <a class="nav-link" href="/add_curso">Adicionar Curso</a>
            </li>
            <li>
              <a class="nav-link" href="/vinc_aluno">Vincular Aluno</a>
            </li>
            <li>
              <a class="nav-link" href="/lista_geral_solicitacoes">Ver Solicitações</a>
            </li>
          </ul>
          <div style="display: flex; align-items: center;">
            <div style="display: flex; align-items: center; border: 3px solid #ccc; border-radius: 7px; margin-top:5px;">
              <img src="img/profile.png" alt="" style="width: 30px; height: 30px; border-radius: 50%; margin: 0 10px;">
              <div style="display: flex; flex-direction: column; padding: 7px;">
                  <p style="font-weight: 500; color: #162938; margin: 0;"><?php echo $_SESSION['nome_usuario']; ?></p>
              </div>
            </div>
            <form action="php/deslogar.php" method="post" style="margin-left: 15px;">
                <button type="submit" class="btnLogin" style="margin-top: 5px;">Sair</button>
            </form>
            </div>
          </div>
    </nav>
    <script>
        function setaNav() {
            document.querySelector('.navbar-collapse').scrollLeft += 50;
        }
    </script>
</body>

</html>
