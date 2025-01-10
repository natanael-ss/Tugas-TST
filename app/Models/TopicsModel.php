<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicsModel extends Model
{
    protected $table = 'topics';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'video_link'];

    public function getTopicById($id)
    {
        return $this->find($id);
    }
    public function findAll(?int $limit = null, int $offset = 0)
    {
        $this->orderBy('id', 'ASC');
        return parent::findAll($limit, $offset);
    }
}