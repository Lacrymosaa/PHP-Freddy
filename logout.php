<?php
  session_start();
  session_destroy();
  echo "<script>
          alert('Logout realizado com sucesso');
          location.href='index.php';
        </script>";
 ?>