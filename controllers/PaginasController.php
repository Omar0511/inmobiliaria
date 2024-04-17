<?php
    namespace Controllers;

    use Model\Propiedad;
    use MVC\Router;
    use PHPMailer\PHPMailer\PHPMailer;

    class PaginasController {
        public static function index(Router $router) {
            $propiedades = Propiedad::get(3);
            
            $inicio = true;

            $router->render('paginas/index', [
                'propiedades' => $propiedades,
                'inicio' => $inicio,
            ]);
        }

        public static function nosotros(Router $router) {
            $router->render('paginas/nosotros', [

            ]);
        }

        public static function propiedades(Router $router) {
            $propiedades = Propiedad::all();

            $router->render('paginas/propiedades', [
                'propiedades' => $propiedades,
            ]);
        }

        public static function propiedad(Router $router) {
            $id = validarORedirrecionar('/propiedades');

            // Buscar la propiedad por su ID
            $propiedad = Propiedad::find($id);

            $router->render('paginas/propiedad', [
                'propiedad' => $propiedad,
            ]);
        }

        public static function blog(Router $router) {
            $router->render('paginas/blog', [

            ]);
        }

        public static function entrada(Router $router) {
            $router->render('paginas/entrada', [

            ]);
        }

        public static function contacto(Router $router) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $respuestas = $_POST['contacto'];

                // Crear INSTANCIA de PHPMAILER
                $mail = new PHPMailer();
                // Configurar STMP
                $mail->isSMTP();               
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = '87373b70d870ab';
                $mail->Password = '823e7a985473ae';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 2525;
                // Configurar contenido E-mail
                // Quién envía el E-mail
                $mail->setFrom('inmobiliaria@inmuebles.com.mx');
                // A que E-mail va llegar el correo
                $mail->addAddress('inmobiliaria@inmuebles.com.mx', 'Inmobiliaria.com');
                // Mensaje que llegará como notificación
                $mail->Subject = 'Tienes un nuevo mensaje';
                // Habilitar HTML
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                // Definir el contenido
                $contenido = '<html>';
                $contenido .= '<p>Tienes un nuevo mensaje</p>';
                $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . ' </p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . ' </p>';
                $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . ' </p>';
                $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] . ' </p>';
                $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . ' </p>';
                $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . ' </p>';
                $contenido .= '</html>';


                $mail->Body = $contenido;
                $mail->AltBody = 'Texto alternativo';
                // Enviar el E-mail
                if ($mail->send()) {
                    echo "E-mail enviado!";
                } else {
                    echo "Error al enviar E-mail";
                }

            }

            $router->render('paginas/contacto', [

            ]);
        }

    }