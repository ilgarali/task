<?php
namespace App\Repository\Interfaces;

interface BaseInterface {
    public function getAll();
    public function getOne(int $id);
    
}