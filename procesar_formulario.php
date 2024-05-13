<?php
// Verificar si se han enviado datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados por el formulario
    $usuarios = $_POST["usuarios"];
    $inventarios = $_POST["inventarios"];
    $rutas = $_POST["rutas"];
    $agentes = $_POST["agentes"];
    $personal = $_POST["personal"];
    $analisis = $_POST["analisis"];

    // Conexión a la base de datos     $servername = "localhost";
    $username = "usuario";
    $password = "contraseña";
    $dbname = "nombre_base_de_datos";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Preparar consulta SQL para insertar datos en la tabla correspondiente
    $sql = "INSERT INTO informacion_empresa (usuarios, inventarios, rutas, agentes, personal, analisis)
            VALUES ('$usuarios', '$inventarios', '$rutas', '$agentes', '$personal', '$analisis')";

    // Ejecutar consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Los datos han sido almacenados correctamente en la base de datos.";
    } else {
        echo "Error al almacenar los datos en la base de datos: " . $conn->error;
    }

    // Cerrar conexión a la base de datos
    $conn->close();
}
?>