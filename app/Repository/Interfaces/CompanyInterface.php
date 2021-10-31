<?php
namespace App\Repository\Interfaces;

interface CompanyInterface {
    public function create($data = []);
    public function update(int $id,$data = []);
    public function delete(int $id);

    
}