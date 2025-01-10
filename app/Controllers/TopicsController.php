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
    
        // Format response data
        $responseData = [
            'status' => 200,
            'data' => array_map(function($topic) {
                return [
                    'id' => $topic['id'],
                    'name' => $topic['name']
                ];
            }, $topics)
        ];
    
        // Respond based on request type
        $format = $this->request->getGet('format'); // Get format from URL if specified
    
        // If format=json in URL or Accept header contains application/json
        if ($format === 'json' || $this->request->getHeaderLine('Accept') === 'application/json') {
            return $this->response->setJSON($responseData);
        }
        
    
        // Default HTML view with option to switch format
        return view('topics', [
            'topics' => $topics,
            'currentUrl' => current_url(),
            'formats' => [
                'html' => current_url(),
                'json' => current_url() . '?format=json'
            ]
        ]);
    }

    public function showTopicDetail($id)
    {
        $topicsModel = new TopicsModel();
        $topic = $topicsModel->getTopicById($id);
    
        if (!$topic) {
            return $this->failNotFound('Materi tidak ditemukan');
        }
    
        // Format response data
        $responseData = [
            'status' => 200,
            'data' => [
                'name' => $topic['name'],
                'description' => $topic['description'],
                'video_link' => $topic['video_link']
            ]
        ];
    
        // Get format from URL if specified
        $format = $this->request->getGet('format');
    
        // If format=json in URL or Accept header contains application/json
        if ($format === 'json' || $this->request->getHeaderLine('Accept') === 'application/json') {
            return $this->response->setJSON($responseData);
        }
        
        // If format=xml in URL
        if ($format === 'xml') {
            return $this->response->setXML($responseData);
        }
    
        // Default HTML view with option to switch format
        return view('topic_detail', [
            'topic' => $topic,
            'currentUrl' => current_url(),
            'formats' => [
                'html' => current_url(),
                'json' => current_url() . '?format=json',
                'xml' => current_url() . '?format=xml'
            ]
        ]);
    }
}