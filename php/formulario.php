<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Registro SCIII</title>
        <!-- Añadimos Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"><link rel="stylesheet" href="formulario_style.css">
    </head>
    <body>
        <div class="container">
            <div class="col-6">
                <div class="group mt-5">
                    <form method="POST" action=" ">
                        <h2 class="mb-3"><em>Formulario de Registro</em></h2>
                        <div class="mb-3">
                            <label class="form-label">Nombre <span><em>(requerido)</em></span></label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellido <span><em>(requerido)</em></span></label>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email <span><em>(requerido)</em></span></label>
                            <input type="email" id="email" class="form-control" name="email" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Suscribirse">
                        
                        <!-- Script de PHP -->
                        <?php

                            if ($_POST) {
                                $nombre = $_POST['nombre'];
                                echo $nombre;
                                $apellido = $_POST['apellido'];
                                echo $nombre;
                                $email = $_POST['email'];
                                echo $email;
                      

                                // Crear conexcion a la Base de datos
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "cursosql";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Chequeamos la conexion
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Almacenar en variable
                                $sql = "INSERT INTO usuario (nombre, apellido, email)
                                VALUES ('$nombre', '$apellido', '$email')";
                                
                                if ($conn->query($sql) === TRUE) {
                                    echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                // Cerrar la base de datos
                                $conn->close();
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>