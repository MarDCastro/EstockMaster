<?php
$password = "supermaster123"; // A senha original
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword; // Isso irá gerar um hash que você pode copiar e colar no banco de dados
?>
