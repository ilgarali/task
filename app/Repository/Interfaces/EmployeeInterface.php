<?php
namespace App\Repository\Interfaces;

interface EmployeeInterface {
    public function create($data = []);
    public function update(int $id,$data = []);
    public function delete(int $id);
    public function getAll();



    
}