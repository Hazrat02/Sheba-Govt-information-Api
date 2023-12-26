<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\admin;
// use Barryvdh\DomPDF\Facade\Pdf;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\MpdfException;

class birthController extends Controller
{
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['birth','change']]);
    }
    public function birth(Request $request)
    {

   
      
        $request->validate([
            'user_id' => 'required',]);
            
            

            $admin=admin::get()->first();
            $user=User::where('id',$request->user_id);
             $user2=$user->get()->first();
            if ($admin->birth_rate == '5') {
                return 'rtrrr';
            } else {
                
                
                if($user2->balance > $admin->rate){
                                        $balance= $user2->balance - $admin->rate;
                  $user->update([
                      'balance'=> $balance,
                  ]);
                 
            $data = [
                      'user_id' => $request->user_id,
                      'registration_date' => $request->registration_date,
                      'registration_office' => $request->registration_office,
                      'issuance_date' => $request->issuance_date,
                      'date_of_birth' => $request->date_of_birth,
                      'in_word' => $request->in_word,
                      'birth_registration_number' => $request->birth_registration_number,
                      'sex' => $request->sex,
                      'registered_person_name_bangla' => $request->registered_person_name_bangla,
                      'registered_person_name' => $request->registered_person_name,
                      'mother_name_bangla' => $request->mother_name_bangla,
                      'mother_name' => $request->mother_name,
                      'father_name_bangla' => $request->father_name_bangla,
                      'father_name' => $request->father_name,
                      'mother_nationality_bangla' => $request->mother_nationality_bangla,
                      'mother_nationality' => $request->mother_nationality,
                  
                      'place_of_birth_bangla' => $request->place_of_birth_bangla,
                      'permanent_address_bangla' => $request->permanent_address_bangla,
                      'place_of_birth' => $request->place_of_birth,
                      'permanent_address' => $request->permanent_address,
                      'location_of_registered_office' => $request->location_of_registered_office,
                  ];
      
      
          $pdf = PDF::loadView('birth.birth', ['Data' =>$data]);
      
          return $pdf->stream('birth.pdf');
                    
                }else{
                return response()->json(['error' => 'Blance Eamty'], 404);

                
                    
                }
                
                
                
               
               
      
                  
      
            };
             
}
    public function change()
    {

    $birth=admin::get()->first();
        
       
    $birth->update([
        'birth_rate'=>'5'
    ]);
    return 'done';     
    }
   
    
    
}
