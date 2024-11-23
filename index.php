<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM posts ORDER BY fecha_creacion DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Aymara</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-aymara">
        <div class="container">
            <a class="navbar-brand" href="#">Blog Aymara</a>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="container-aymara">
            <h1 class="titulo-blog">Relatos del Norte</h1>
            <a href="crear.php" class="btn btn-aymara-primary mb-4">Crear Nuevo Relato</a>
            
            <?php foreach($posts as $post): ?>
                <div class="card card-aymara">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($post['titulo']); ?></h5>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($post['contenido'])); ?></p>
                        <p class="text-muted">Fecha: <?php echo $post['fecha_creacion']; ?></p>
                        <a href="editar.php?id=<?php echo $post['id']; ?>" class="btn btn-aymara-warning">Editar</a>
                        <a href="eliminar.php?id=<?php echo $post['id']; ?>" class="btn btn-aymara-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html> 