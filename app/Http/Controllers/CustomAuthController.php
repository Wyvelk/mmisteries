<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
            'name' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('name', 'password');
        
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
        $this->create($data);
        $credentials = $request->only('name', 'email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }
        
        return redirect('/registration')->withSuccess('Cette équipe existe déjà...');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return redirect('/');
    }
}