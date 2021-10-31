<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
 

    public function test_only_logged_can_see_companies()
    {
       $this->actingAs(User::first());   
       $response = $this->get('/admin/company')->assertOk();        

       
    }

    public function test_create_company()
     {
         $data = [
            'name'=>'test com',
            'email'=>'eliyev.iq@gmail.com',
            'website'=>'https://ilgaraliyev.com/',
            
         ];
         $this->actingAs(User::first());   

         $response = $this->post('/admin/company',$data)->assertRedirect('/admin/company');
     }

     public function test_update_company()
     {
         $data = [
            'name'=>'test com',
            'email'=>'eliyev.iq@gmail.com',
            'website'=>'https://ilgaraliyev.com/',
            
         ];
         
         $this->actingAs(User::first());   

         $latest = Company::latest()->first();
         $response = $this->put('/admin/company/' . $latest->id,$data)->assertRedirect('/admin/company');
     }

     public function test_delete_company()
     {
        
         $this->actingAs(User::first());   
         $latest = Company::latest()->first();

         $response = $this->delete('/admin/company/' . $latest->id)->assertRedirect('/admin/company');
     }
    
}
