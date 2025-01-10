<?php
// Decode the JSON string
$json = '{
    "quiz": {
        "title": "Kuis Keseluruhan",
        "description": "Kuis untuk keseluruhan materi yang tersedia"
    },
    "questions": [
        {
            "id": "1",
            "question_text": "Lambang pengganti suatu bilangan yang belum diketahui nilainya adalah...",
            "options": [
                {
                    "option_text": {
                        "text": "variabel",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "konstanta",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "koefisien",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "komutatif",
                        "value": "t"
                    }
                }
            ]
        },
        {
            "id": "2",
            "question_text": "Nilai maksimal dari fungsi sinus (SIN) adalah...",
            "options": [
                {
                    "option_text": {
                        "text": "1",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "2",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "0.5",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "0",
                        "value": "t"
                    }
                }
            ]
        },
        {
            "id": "4",
            "question_text": "Selesaikan persamaan berikut: 2x - 4 = 10",
            "options": [
                {
                    "option_text": {
                        "text": "x = 7",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "x = 6",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "x = 5",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "x = 3",
                        "value": "t"
                    }
                }
            ]
        },
        {
            "id": "5",
            "question_text": "Jika pola bilangan adalah 2, 4, 8, 16, … berapakah suku ke-6?",
            "options": [
                {
                    "option_text": {
                        "text": "64",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "128",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "32",
                        "value": "t"
                    }
                },
                {
                    "option_text": {
                        "text": "256",
                        "value": "t"
                    }
                }
            ]
        }
    ]
}';

$data = json_decode($json, true);

if ($data["status"] === 200) {
    $items = $data["data"];
} else {
    $items = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - <?= $data['quiz']['title'] ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        function submitQuiz(event) {
            event.preventDefault();
            const form = event.target;
            const answers = new FormData(form);
            const answeredQuestions = answers.getAll('question').length;
            const totalQuestions = <?= count($data['questions']) ?>;

            if (answeredQuestions < totalQuestions) {
                alert(`Mohon jawab semua pertanyaan (${answeredQuestions}/${totalQuestions} terjawab)`);
                return;
            }

            // Here you can implement the submission logic
            console.log('Quiz submitted');
            alert('Kuis berhasil diselesaikan!');
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Quiz Header -->
            <div class="bg-indigo-600 p-6 text-white">
                <h1 class="text-2xl font-bold"><?= $data['quiz']['title'] ?></h1>
                <p class="mt-2 text-indigo-100"><?= $data['quiz']['description'] ?></p>
            </div>

            <!-- Quiz Content -->
            <form onsubmit="submitQuiz(event)" class="p-6">
                <div class="space-y-8">
                    <?php foreach ($data['questions'] as $index => $question): ?>
                        <div class="p-6 bg-gray-50 rounded-lg border border-gray-200">
                            <!-- Question Header -->
                            <div class="flex items-center space-x-2 mb-4">
                                <span class="bg-indigo-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-medium">
                                    <?= $index + 1 ?>
                                </span>
                                <h2 class="text-lg font-medium text-gray-800"><?= $question['question_text'] ?></h2>
                            </div>

                            <!-- Options -->
                            <div class="space-y-3 ml-10">
                                <?php foreach ($question['options'] as $optIndex => $option): ?>
                                    <label class="flex items-center p-3 bg-white rounded-md border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors duration-150">
                                        <input type="radio" 
                                               name="question[<?= $question['id'] ?>]" 
                                               value="<?= $optIndex ?>" 
                                               class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                        <span class="ml-3 text-gray-700"><?= $option['option_text']['text'] ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-center">
                    <button type="submit" 
                            class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Submit Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
