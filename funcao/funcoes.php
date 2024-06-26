<?php
function databr($datapega)
{
$data = explode('-',$datapega);
$datacerta = $data[2].'-'.$data[1].'-'.$data[0];
return $datacerta;
}
function databr2($datapega)
{
$data = explode('/',$datapega);
$datacerta = $data[2].'-'.$data[1].'-'.$data[0];
return $datacerta;
}

function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}
function moedas($numero)
{
    $numero = number_format($numero, 2, ',', '.');
    return $numero;
}
function valorinteiro($numero)
{
    $numero = number_format($numero, 2, '', '.');
    return $numero;
}


// funcion para sanitizar variables
function limpiar($mensaje)
{
$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;
}

// ip real
function getRealIP()
{
   
   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   
      // los proxys van a�adiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una direcci�n ip que no sea del rango privado. En caso de no
      // encontrarse ninguna se toma como valor el REMOTE_ADDR
   
      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
   
      reset($entries);
      while (list(, $entry) = each($entries))
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./',
                  '/^127\.0\.0\.1/',
                  '/^192\.168\..*/',
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                  '/^10\..*/');
   
            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
   
            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   }
   
   return $client_ip;
   
}

?>