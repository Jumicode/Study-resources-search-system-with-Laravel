<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{
    
   
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = JWTAuth::fromUser($user);
        return redirect()->route('auth.login.view')->with('success', 'Registration successful! Please log in.');
    }
  
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (!$token = JWTAuth::attempt($credentials)) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    
        $user = auth()->user();
        
        return redirect()->route('resources.search')->with([
            'success' => 'Welcome back, ' . $user->name . '!',
            'token' => $token
        ]);
    }
    
    
    public function me()
    {
        return response()->json(auth()->user());
    }
    // Cerrar sesión
    public function logout()
    {
        auth()->logout();
    return redirect()->route('welcome')->with('success', 'You have been logged out.');
    }
}