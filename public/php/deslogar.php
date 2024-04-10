<?php
session_start();

$_SESSION = array();

// Destruir a sessão
session_destroy();

echo "<script language='javascript' type='text/javascript'>alert('Deslogado com sucesso!');window.location.href='/';</script>";
header("Location: /");
exit; // Encerrar o script para garantir que o redirecionamento ocorra sem problemas
?>
