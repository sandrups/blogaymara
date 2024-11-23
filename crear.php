<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    
    $stmt = $pdo->prepare("INSERT INTO posts (titulo, contenido) VALUES (?, ?)");
    $stmt->execute([$titulo, $contenido]);
    
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Relato</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-aymara">
        <div class="container">
            <a class="navbar-brand" href="index.php">Blog Aymara</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="container-aymara">
            <h1 class="titulo-blog">Nuevo Relato</h1>
            <form method="POST">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Contenido</label>
                    <textarea name="contenido" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-aymara-primary">Guardar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html> 