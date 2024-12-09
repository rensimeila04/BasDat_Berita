<?php
require '../config/db.php';

$collection = connectMongoDB();
$id = new MongoDB\BSON\ObjectId($_GET['id']);
$news = $collection->findOne(['_id' => $id]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="../public/index.php">BERITA NIH</a>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <h1><?php echo $news['title']; ?></h1>
        <p><em>Ditulis oleh <?php echo $news['author']; ?> | <?php echo $news['created_at']->toDateTime()->format('Y-m-d'); ?></em></p>

        <?php if (!empty($news['image'])): ?>
            <img src="../uploads/<?php echo htmlspecialchars($news['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($news['title']); ?>">
        <?php endif; ?>

        <div class="mt-4">
            <p><?php echo nl2br(htmlspecialchars($news['content'])); ?></p>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>