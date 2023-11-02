<?php
function usuarioOk($usuario, $contraseña): bool
{

   return (strlen($usuario) >= 8  && $usuario == strrev($contraseña));
}

function contarPalabras($cadena)
{
   return str_word_count($cadena, 0);
}
function letraMasRepetida($cadena)
{
   $vecesMax = 0;
   $letraMax = 'a'; 
   $tamaño = strlen($cadena);
   for ($i = 0; $i < $tamaño; $i++) {
      $veces = 1;
      $letrai = $cadena[$i];
      // Busco en resto de array
      for ($j = $i + 1; $j < $tamaño; $j++) {
         if ($letrai == $cadena[$j]) {
            $veces++;
         }
      }
      if ($veces > $vecesMax) {
         $letraMax = $letrai;
         $vecesMax = $veces;
      }
   }
   return $letraMax;
}


function palabraMasRepetida($cadena)
{
   $arraypalabras = str_word_count($cadena, 1);


   // Genera una tabla con clave palabra y valor las veces que aparece
   $arraypalabrasveces = array_count_values($arraypalabras);

   asort($arraypalabrasveces);
   // Muestro el último porque tiene el valor más alto
   return array_key_last($arraypalabrasveces);
}

function limpiarEntrada(&$cadena)
{
   $cadena = htmlspecialchars($cadena);
}
