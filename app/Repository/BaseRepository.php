<?php
namespace App\Repository;

use App\Repository\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface{
    
    public Model $model;
    public function __construct(Model $model) {
        $this->model = $model;
    }
    
    public function getAll(): Collection
    {
        return $this->model->latest()->get();
    }

    public function getOne(int $id): Model
    {
        return $this->model->where('id',$id)->first();
        
    }
}