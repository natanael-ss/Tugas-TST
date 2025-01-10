<?php
$jsonQuiz = '{
    "quiz": {
        "title": "Kuis Keseluruhan",
        "description": "Kuis untuk keseluruhan materi yang tersedia"
    },
    "questions": [
        {
            "sequence": 1,
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
                        "value": "f"
                    }
                },
                {
                    "option_text": {
                        "text": "koefisien",
                        "value": "f"
                    }
                },
                {
                    "option_text": {
                        "text": "komutatif",
                        "value": "f"
                    }
                }
            ]
        },
        {
            "sequence": 2,
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
                        "value": "f"
                    }
                },
                {
                    "option_text": {
                        "text": "0.5",
                        "value": "f"
                    }
                },
                {
                    "option_text": {
                        "text": "0",
                        "value": "f"
                    }
                }
            ]
        },
        {
            "sequence": 3,
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
                        "value": "f"
                    }
                },
                {
                    "option_text": {
                        "text": "x = 5",
                        "value": "f"
                    }
                },
                {
                    "option_text": {
                        "text": "x = 3",
                        "value": "f"
                    }
                }
            ]
        },
        {
            "sequence": 4,
            "question_text": "Jika pola bilangan adalah 2, 4, 8, 16, … berapakah suku ke-6?",
            "options": [
                {
                    "option_text": {
                        "text": "64",
                        "value": "f"
                    }
                },
                {
                    "option_text": {
                        "text": "128",
                        "value": "f"
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
                        "value": "f"
                    }
                }
            ]
        }
    ]
}';

$quiz = json_decode($jsonQuiz, true);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $quiz['quiz']['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $quiz['quiz']['title'] ?></h3>
                <p class="card-text"><?= $quiz['quiz']['description'] ?></p>
            </div>
            <div class="card-body">
                <form action="#" method="POST" id="quizForm">
                    <?php foreach ($quiz['questions'] as $index => $question): ?>
                        <div class="mb-4">
                            <p class="fw-bold">
                                <?= $question['sequence'] ?>. <?= $question['question_text'] ?>
                            </p>
                            
                            <?php foreach ($question['options'] as $optionIndex => $option): ?>
                                <div class="form-check mb-2">
                                    <input 
                                        class="form-check-input" 
                                        type="radio" 
                                        name="jawaban[<?= $index ?>]" 
                                        id="q<?= $index ?>_<?= $optionIndex ?>" 
                                        value="<?= $option['option_text']['text'] ?>"
                                        data-correct="<?= $option['option_text']['value'] ?>"
                                    >
                                    <label class="form-check-label" for="q<?= $index ?>_<?= $optionIndex ?>">
                                        <?= $option['option_text']['text'] ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                    </div>
                </form>

                <div id="hasilQuiz" class="mt-4" style="display: none;">
                    <div class="alert alert-info">
                        <h5>Hasil Kuis:</h5>
                        <p>Skor Anda: <span id="nilaiAkhir">0</span> dari <?= count($quiz['questions']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('quizForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let benar = 0;
            const totalSoal = <?= count($quiz['questions']) ?>;
            const jawaban = document.querySelectorAll('input[type="radio"]:checked');
            
            jawaban.forEach(function(radio) {
                if(radio.dataset.correct === 't') {
                    benar++;
                    radio.parentElement.classList.add('text-success');
                } else {
                    radio.parentElement.classList.add('text-danger');
                }
            });

            // Tampilkan semua jawaban yang benar
            document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
                if(radio.dataset.correct === 't') {
                    radio.parentElement.classList.add('text-success', 'fw-bold');
                }
                radio.disabled = true;
            });

            document.getElementById('nilaiAkhir').textContent = benar;
            document.getElementById('hasilQuiz').style.display = 'block';
            document.querySelector('button[type="submit"]').disabled = true;
        });
    </script>
</body>
</html>