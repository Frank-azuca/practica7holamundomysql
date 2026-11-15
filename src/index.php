<?php
// Datos de conexión: vienen de las variables de entorno definidas en docker-compose.yml
$host     = getenv('DB_HOST');
$dbname   = getenv('DB_NAME');
$user     = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

$mensaje = '';
$error   = '';
$version = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $version = $pdo->query('SELECT VERSION()')->fetchColumn();
    $mensaje = $pdo->query('SELECT texto FROM saludos LIMIT 1')->fetchColumn();
} catch (PDOException $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hola Mundo PHP + MySQL</title>
</head>
<body>
  <h1>Hola Mundo</h1>

  <?php if ($error): ?>
    <p style="color: red;">Error al conectar con la base de datos: <?= htmlspecialchars($error) ?></p>
  <?php else: ?>
    <p style="color: green;">Conexión exitosa a MySQL <?= htmlspecialchars($version) ?></p>
    <p>Mensaje leído de la base de datos: <strong><?= htmlspecialchars($mensaje) ?></strong></p>
  <?php endif; ?>
</body>
</html>
