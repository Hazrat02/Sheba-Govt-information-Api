<?php
namespace App\Http\Controllers\auth;
use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\ask;
use App\Models\User;
use App\Models\payment;
use App\Mail\forgetEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\UploadedFile;
use thiagoalessio\TesseractOCR\TesseractOCR;
use App\Services\PdfParserService;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    

     protected $pdfParser;
    public function __construct(PdfParserService $pdfParser)
    {
        $this->pdfParser = $pdfParser;
        $this->middleware('auth:api', ['except' => ['login','register','ask','sendForgetEmail','forget','pdf','upload']]);
    }

    public function login(Request $request)
    {

        // $password = Hash::make($request->password);
        // dd($password);
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users',
            'password' => 'required|string',
        ]);
        
        $credentials = $request->only('email', 'password');
        // $user=User::where('email',$request->email)->get()->first();

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your email or password wrong!',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(Request $request){
      
    
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'use_reffer'=>'required|max:255|exists:users,my_reffer',
        ]);


        
        $reffer =explode('-', User::max('my_reffer'));
        
        $setreffer = (int)$reffer[1] + 1;
        $my_reffer = 'CPA'.'-'.$setreffer;
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
        
        
        $name =rand(0000000,999999) .$file->getClientOriginalName();
        $file->move(public_path('img/profile'), $name);
        $path=asset('img/profile/');
       $url= $path.'/'.$name;
       
        }else{
            $url='';
           

        }




        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile'=>$url,
            'my_reffer'=>$my_reffer,
            'use_reffer'=>$request->use_reffer,
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);}
    public function me()
    {
        // $authUser=User::where('id',auth()->user()->id)->get();
        return response()->json([
            
            'authUser' => Auth::user(),
  
        ]);}


        
    public function sendForgetEmail(Request $request)
    {
        // if($request->type=='register'){
        //     $request->validate([
            
        //         'email' => 'required|string|email|max:255',
                
        //     ]);
        // }
        // if($request->type=='forget'){
        //     $request->validate([
            
        //         'email' => 'required|string|email|max:255|exists:users',
                
        //     ]);
        // }
        
        $forgetCode = rand(10000, 99999); // Generate a random forget code
        $title='Welcome to Our Cpaearn!';
        $btn='Wait Few Days';
        $sub=$request->sub;
        Mail::to($request->email)
            ->send(new forgetEmail($forgetCode,$title,$btn,$sub));
            return response()->json([
                'code' =>$forgetCode,
                'email' =>$request->email,
               
            ]);
        
    }


    public function forget(Request $request)
    {
       
            $request->validate([
                'email' => 'required|string|email|max:255|exists:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
    
            $password= Hash::make($request->password);
            
        


        $response = User::where('email', $request->email)->update([
            
            'password'=>$password,
           
            
        ]);


        return response()->json([
            'message'=>'Password Updated'
        ]);
    }
    public function pdf()
    {
       
        // $image = $request->file('image');
    
        // Save the image to a temporary location
        // $imagePath = $image->storeAs('temp', 'uploaded_image.png', 'public');
        // $imagePath = 'img\method\607743Screenshot_3.png';
    
        // Use Tesseract to extract text
        $text = (new TesseractOCR('https://api.baskadia.com/static/page/85575/e7f5d11c-468d-4b50-888e-490cf0ab2523.png'))->run();
    
        // Do something with the extracted text
        return response()->json(['text' => $text]);
      
    }


 

    public function upload()
    {
        // $request->validate(['file' => 'required|mimes:pdf|max:2048']);
        $pdfPath = public_path('img/pd.pdf');
            $text = Pdf::getText($pdfPath);
            dd($text);
        try {
            $pdfPath = public_path('img/pd.pdf');
            $text = Pdf::getText($pdfPath);
            dd($text);
            // $parsedData = $this->pdfParser->parse($pdfPath);

            // return response()->json($parsedData, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
