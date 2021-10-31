<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_only_logged_can_see_employees()
    {
       $this->actingAs(User::first());   
       $response = $this->get('/admin/employee')->assertOk();        

       
    }

    public function test_create_employee()
     {
         $data = [
            'firstname'=>'ilgar',
            'lastname'=>'aliyev',
            
         ];
         $this->actingAs(User::first());   

         $response = $this->post('/admin/employee',$data)->assertRedirect('/admin/employee');
     }

     public function test_update_employee()
     {
         $data = [
            'firstname'=>'ilgar',
            'lastname'=>'aliyev',
            'email'=>'eliyev.iq@gmail.com',
           
            'phone'=>'8044771',
            
         ];
         $this->actingAs(User::first());   
         $latest = Employee::latest()->first();

         $response = $this->put('/admin/employee/' . $latest->id,$data)->assertRedirect('/admin/employee');
     }

     public function test_delete_employee()
     {
        
         $this->actingAs(User::first());   
         $latest = Employee::latest()->first();

         $response = $this->delete('/admin/employee/' . $latest->id)->assertRedirect('/admin/employee');
     }
}
