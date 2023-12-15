<?php
//recogemos datos del formulario
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$nombre_empresa = $_POST['nombre_empresa'];
$estado = $_POST['estado'];
$telefono_empresa = $_POST['telefono_empresa'];
$num_empleados = $_POST['num_empleados'];

//Conexion BD
    $db = mysqli_connect('162.214.154.129', 'grupokap_cesarCampa', 'dTS~o+6XP)NV', 'grupokap_maquilaNomina');
    $errors = [];

//Realizamos Insert
  $query = "INSERT INTO datos_formulario (nombre_completo, correo, nombre_empresa, estado, telefono_empresa, num_empleados)
            VALUES ('$nombre_completo', '$correo', '$nombre_empresa', '$estado', '$telefono_empresa', $num_empleados)";
  $inserta = mysqli_query($db, $query);
  if($inserta == TRUE){
        $destinatario = "$correo, cesar.perez@kaptarh.com, jnunez@kaptarh.com, contacto@kaptarh.com";
        $asunto = "¡Registro correcto!";
        $mensaje = '
        <html>
            <head>
                <title>Maquila de Nómina</title>
            </head>
        <body>
            <h1 style="text-align: center;">¡Gracias por ponerte en contacto con nosotros!</h1>
            <h2 style="text-align: center;">Hemos recibido tu mensaje, en breve un ejecutivo se comunicará contigo</h2>
            <p style="text-align: justify;">Para más información sobre nuestros servicios visita <a href="https://kaptarh.com">kaptarh.com</a>. Somos especialistas
            en Consultoría Integral en Recursos Humanos, Maquila y timbrado de nómina, Reclutamiento y 
            Selección de Personal, Gestión en Trámites Migratorios y en Capacitación.</p>
            <h2 style="text-align: center;">Acerca de nosotros</h2>
            <p style="text-align: justify;">Kapta RH es una empresa  100% mexicana, con más de 16 años en el mercado. Nos hemos especializado en crear estrategias integrales en el sector empresarial y gubernamental en torno al capital humano.</p>
            <p style="text-align: justify;">Hemos ganado clientes gracias a nuestra calidad en el servicio y valores agregados. Brindamos a nuestros clientes y colaboradores esfuerzos enfocados a la expansión de su negocio.</p>
            <p style="text-align: justify;">Contamos con un equipo integral de atención que nos permite tener herramientas de vanguardia, tecnología que eficienta los procesos administrativos, ya que somos especialistas en asesorías integrales en temas fiscales, legales y laborales.</p>
            <img src="https://kaptarh.com/maquilaDeNomina/kapta-rh-color.png" alt="KaptaRh">
        </body>
        </html>
        ';

// Headers para especificar el tipo de contenido y el remitente
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: contacto@kaptarh.com" . "\r\n";

// Envío del correo
        mail($destinatario, $asunto, $mensaje, $headers);
      
        echo "<script>
                alert('Gracias por registrarte, en breve nos contactaremos contigo');
                window.location= 'https://kaptarh.com/maquilaDeNomina/'
            </script>";
      
  }else{
      echo "<script>
                alert('Ocurrio un error: Lo siento, intenta nuevamente');
                window.location= 'index.php'
            </script>";
  }

?>