<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir los archivos de PHPMailer
require 'vendor/autoload.php'; // Si usas Composer
// Si no usas Composer, usa las siguientes líneas:
// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $age = $_POST['age'];
    // $sucursal = $_POST['country'];
    $motivo = $_POST['reason'];
    $mensaje = $_POST['message'];

    // Define aquí el destinatario según la sucursal seleccionada
    $to = 'jorge.sotomayor.t@gmail.com'; 
    // if ($sucursal == 'argentina') {
    //     $to = 'argentina@example.com';
    // }

    $subject = "Contacto desde el formulario - $motivo";

    $mail = new PHPMailer(true);
    // zkef mbmf deww jifx
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jorge.sotomayor.t@gmail.com';
        $mail->Password = 'zkefmbmfdewwjifx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('jorge.sotomayor.t@gmail.com', $nombre);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = "Nombre: $nombre\nCorreo: $email\nTeléfono: $phone\nMotivo: $motivo\n\nMensaje:\n$mensaje";

        $mail->send();
        echo 'Mensaje enviado correctamente.';
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>
