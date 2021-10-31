<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Repository\CompanyRepository;
use App\Repository\Interfaces\EmployeeInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $employeeRepository;
    public $companyRepository;


    public function __construct(EmployeeInterface $employeeRepository,CompanyRepository $companyRepository) {
       $this->employeeRepository = $employeeRepository;
       $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employeeRepository->getAll();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = $this->companyRepository->getAll();;
        return view('employee.create',compact('companies'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = [
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'company_id'=>$request->company_id == 0 ? null : $request->company_id,
            'email'=>$request->email,
            'phone'=>$request->phone

        ];
        $this->employeeRepository->create($data);

        return redirect()->route('employee.index')->with('success','Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employeeRepository->getOne($id);
        $companies = $this->companyRepository->getAll();
        return view('employee.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $data = [
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'company_id'=>$request->company_id == 0 ? null : $request->company_id,
            'email'=>$request->email,
            'phone'=>$request->phone

        ];
        $this->employeeRepository->update($id,$data);

        return redirect()->route('employee.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $this->employeeRepository->delete($id);

        return redirect()->route('employee.index')->with('success','Deleted');
    }
}
