<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\User;
use App\Notifications\CompanyCreated;
use App\Repository\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public $companyRepository;
    public function __construct(CompanyRepository $companyRepository) {
        $this->companyRepository = $companyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->companyRepository->getAll();
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'logo'=>$request->hasFile('logo') ? $request->file('logo') : null
        ];
        $company = $this->companyRepository->create($data);
        $user = User::where('id',Auth::user()->id)->first();
        $user->notify(new CompanyCreated($company));

        return redirect()->route('company.index')->with('success','Created');
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
        $company = $this->companyRepository->getOne($id);
        return view('company.edit',compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'logo'=>$request->hasFile('logo') ? $request->file('logo') : null
        ];
        $this->companyRepository->update($id,$data);

        return redirect()->route('company.index')->with('success','Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
        $this->companyRepository->delete($id);

        return redirect()->route('company.index')->with('success','Deleted');

    }
}
