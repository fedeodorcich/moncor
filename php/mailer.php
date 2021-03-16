<?php 

$para = 'fede.odorcich@gmail.com, fede.odorcich@outlook.com';
$titulo = 'Enviando email desde PHP';
$mensaje = 'Este es un email que se envía a múltiples destinatarios';
$cabeceras = 'From: Fede ';

$enviado = mail($para, $titulo, $mensaje, $cabeceras);

if ($enviado)
  echo 'Email enviado correctamente a '.$para;
else
  echo 'Error en el envío del email';
 ?>