<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    
    $stmt = $pdo->prepare("UPDATE posts SET titulo = ?, contenido = ? WHERE id = ?");
    $stmt->execute([$titulo, $contenido, $id]);
    
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Relato</title>
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
            <h1 class="titulo-blog">Editar Relato</h1>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" value="<?php echo htmlspecialchars($post['titulo']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Contenido</label>
                    <textarea name="contenido" class="form-control" rows="5" required><?php echo htmlspecialchars($post['contenido']); ?></textarea>
                </div>
                <button type="submit" class="btn btn-aymara-primary">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html> 