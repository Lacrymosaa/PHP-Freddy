<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="pag.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Register</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
    crossorigin="anonymous"></script>
  <!--NAVBAR-->
  <nav class="navbar navbar-custom navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Freddy Fazbear's Pizza</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbar" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="register.html">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--END NAVBAR-->

  <!--CARD LOGIN-->
  <div class="container col d-flex justify-content-center" style="opacity: 92%">
    <div class="card card-custom my-4 border-dark" style="width: 65%;height: fit-content; display: inline-flex;">
      <div class="card-body">
        <h5 class="card-title">
          <h3>Register</h3>
          <form method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Endereço de e-mail</label>
              <input type="email" name="email" class="form-control" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">Nós não compartilharemos seu e-mail com ninguém.</div>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Usuário</label>
              <input type="username" name="username" class="form-control" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">Seus dados estarão seguros conosco.</div>
            </div>
            <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" name="senha" class="form-control" required>
              <div id="emailHelp" class="form-text">Funcionários da Freddy's Entertainment nunca pedirão sua senha.
              </div>
            </div>
            <button type="submit" class="btn btn-secondary" href="login.php">Submit</button>
          </form>
          <?php

          require('./assets/config/connect.php');

          if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            try {
              $stmt1 = $conn->prepare("SELECT * FROM `cadastros` WHERE `email` = :email");
              $stmt1->bindParam("email", $email);
              $stmt1->execute();
              if ($stmt1->rowCount() >= 1) {
                echo 'Email is already been used!';
              } else {
                $stmt2 = $conn->prepare("INSERT INTO `cadastros` (`id`, `username`, `email`, `senha`) VALUES (NULL, :username, :email, :senha);");
                $stmt2->bindParam("username", $username);
                $stmt2->bindParam("email", $email);
                $stmt2->bindParam("senha", $senha);

                if ($stmt2->execute()) {
                  header("Location:login.php");
                } else {
                  header("Location:register.php?msg=Erro na inclusão do usuário!");
                }
              }

            } catch (PDOException $e) {
              $e->getMessage();
            }

            $conn = null;
            $stmt1 = null;
            $stmt2 = null;
          }

          ?>
      </div>
    </div>
  </div>
  <!--END CARD-->
</body>

</html>