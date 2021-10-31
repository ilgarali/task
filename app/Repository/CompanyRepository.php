<?php
namespace App\Repository;

use App\Models\Company;
use App\Repository\Interfaces\CompanyInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CompanyRepository extends BaseRepository implements CompanyInterface{
   
    public function __construct(Company $model) {
        parent::__construct($model);
    }
    public function create($data = []) {
        
        if ($data['logo'] != null) {
            $data['logo'] = $this->uploadLogo($data['logo']);
        }

       return  $this->model::create($data);
    }
    public function update(int $id,$data = []){
       
        if ($data['logo'] != null) {
            $data['logo'] = $this->uploadLogo($data['logo']);
        }else {
            $company = $this->model::where('id',$id)->first();
            $data['logo'] = $company->logo;
        }
       return Company::where('id',$id)->update($data);
    }
    public function delete(int $id){
        $company = $this->model::find($id);
        if ($company->logo != null) {
            Storage::delete($company->logo);
        }
        $company->employees()->delete();

        return  $company->delete();
    }

    public function uploadLogo($logo)
    {
        $imageName = Str::random(40) . '.' . $logo->getClientOriginalExtension();
        $logo->storeAs('',$imageName);
        return $imageName;


    }
 
}