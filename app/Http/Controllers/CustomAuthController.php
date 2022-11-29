<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if($request->img_url != null){
            $file = Storage::disk('public')->put('avatars', $request->img_url);
        }
        
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:4',
            'players' => 'required',
        ]);
        $data = $request->all();
        $verif = DB::select("select name from users where name = ?", [$data['name']]);
        if($verif == NULL){
            $this->create($data);
            $credentials = $request->only('name', 'players', 'password');
        
            if (Auth::attempt($credentials)) {
                $user = User::whereRaw('id='.Auth::user()->id)->get();
                $user[0]->img_url = $file;
                $user[0]->save();
                return redirect()->intended('/')
                            ->withSuccess('Signed in');
            }
        } else {
            return redirect('/registration')->withSuccess('Une autre équipe possède déjà ce nom...');
        }
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return redirect('/');
    }
}