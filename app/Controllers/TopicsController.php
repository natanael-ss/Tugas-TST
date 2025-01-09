<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TopicsModel;

class TopicsController extends ResourceController
{
    public function showTopics()
    {
        $topicsModel = new TopicsModel();
        $topics = $topicsModel->findAll();

        // Deteksi request dari Postman
        $userAgent = $this->request->getUserAgent();
        $isPostman = strpos($userAgent, 'PostmanRuntime') !== false;

        // Jika request dari Postman, return JSON
        if ($isPostman) {
            return $this->response->setJSON([
                'status' => 200,
                'data' => array_map(function($topic) {
                    return [
                        'id' => $topic['id'],
                        'name' => $topic['name']
                    ];
                }, $topics)
            ]);
        }

        // Jika bukan dari Postman (browser), tampilkan view
        return view('topics', ['topics' => $topics]);
    }

    public function showTopicDetail($id)
    {
        $topicsModel = new TopicsModel();
        $topic = $topicsModel->getTopicById($id);

        if (!$topic) {
            return $this->failNotFound('Materi tidak ditemukan');
        }

        $userAgent = $this->request->getUserAgent();
        $isPostman = strpos($userAgent, 'PostmanRuntime') !== false;

        if ($isPostman) {
            return $this->response->setJSON([
                'status' => 200,
                'data' => [
                    'name' => $topic['name'],
                    'description' => $topic['description'],
                    'video_link' => $topic['video_link']
                ]
            ]);
        }

        return view('topic_detail', ['topic' => $topic]);
    }
}