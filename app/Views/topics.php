<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Topics</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-book-open mr-3 text-indigo-600"></i>
                Available Topics
            </h2>
            
            <div class="grid gap-4">
                <?php foreach ($topics as $topic): ?>
                    <div class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition duration-150 ease-in-out border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="bg-indigo-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm font-medium">
                                    <?= $topic['id']; ?>
                                </span>
                                <h3 class="text-lg font-medium text-gray-800">
                                    <?= $topic['name']; ?>
                                </h3>
                            </div>
                            <a href="/topik/<?= $topic['id']; ?>" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Lanjut
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>