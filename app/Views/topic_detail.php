<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $topic['name']; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 0.5rem;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header Section -->
            <div class="bg-indigo-600 p-6">
                <h2 class="text-2xl font-bold text-white">
                    <?= $topic['name']; ?>
                </h2>
            </div>

            <!-- Content Section -->
            <div class="p-6 space-y-6">
                <!-- Description Card -->
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-indigo-600"></i>
                        Description
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        <?= $topic['description']; ?>
                    </p>
                </div>

                <!-- Video Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-play-circle mr-2 text-indigo-600"></i>
                        Video Tutorial
                    </h3>
                    <div class="video-wrapper bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div class="video-container shadow-lg">
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
                                    <div class="flex items-center justify-center h-48 bg-gray-200 rounded-lg">
                                        <p class="text-gray-600">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            Format URL video tidak valid
                                        </p>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="flex items-center justify-center h-48 bg-gray-200 rounded-lg">
                                    <p class="text-gray-600">
                                        <i class="fas fa-video-slash mr-2"></i>
                                        Video tidak tersedia
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Navigation Button -->
                <div class="pt-4">
                    <a href="/topik" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar Materi
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>