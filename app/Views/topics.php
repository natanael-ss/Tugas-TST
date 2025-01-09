<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Topics</title>
</head>
<body>
    <h2>All Topics</h2>
    <ul>
        <?php foreach ($topics as $topic): ?>
            <li>
                <?= $topic['id']; ?>: <?= $topic['name']; ?>
                <a href="/topik/<?= $topic['id']; ?>">Lanjut</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
