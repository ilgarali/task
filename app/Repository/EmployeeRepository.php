<?php
namespace App\Repository;


use App\Models\Employee;
use App\Repository\Interfaces\EmployeeInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class EmployeeRepository extends BaseRepository implements EmployeeInterface{
   
    public function __construct(Employee $model) {
        parent::__construct($model);
    }

    public function getAll(): Collection
    {
        return $this->model->with('company')->latest()->get();

    }

    public function create($data = []) {
        
      

        $this->model::create($data);
    }
    public function update(int $id,$data = []){
       
       
        $this->model::where('id',$id)->update($data);
    }
    public function delete(int $id){
        
        
        
        $employee = $this->model->find($id);
        $employee->delete($id);
    }

  
 
}