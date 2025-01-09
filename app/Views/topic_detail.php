<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $topic['name']; ?></title>
    <style>
        .wrapper {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .video-wrapper {
            max-width: 640px;  /* Mengatur lebar maksimum container */
            margin: 20px auto;  /* Membuat center secara horizontal */
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2><?= $topic['name']; ?></h2>
        
        <div class="description">
            <p><?= $topic['description']; ?></p>
        </div>

        <div class="video-wrapper">
            <div class="video-container">
                <?php if ($topic['video_link']): ?>
                    <?php
                    $video_id = '';
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $topic['video_link'], $match)) {
                        $video_id = $match[1];
                    }
                    ?>
                    <?php if ($video_id): ?>
                        <iframe 
                            src="https://www.youtube.com/embed/<?= $video_id; ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    <?php else: ?>
                        <p>Format URL video tidak valid</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Video tidak tersedia</p>
                <?php endif; ?>
            </div>
        </div>

        <a href="/topik">Kembali ke Daftar Materi</a>
    </div>
</body>
</html>