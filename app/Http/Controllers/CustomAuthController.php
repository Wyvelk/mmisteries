<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Erreur de connexion, veuillez réessayer.');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      

    public function create(array $data)
    {
      User::create([
        'name' => $data['name'],
        'slogan' => $data['slogan'],
        'password' => Hash::make($data['password']),
        'email' => $data['email']
      ]);
    }    
    
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:4',
            'email' => 'required',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }

    }

    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess("C'est non.");
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return redirect('/');
    }
}