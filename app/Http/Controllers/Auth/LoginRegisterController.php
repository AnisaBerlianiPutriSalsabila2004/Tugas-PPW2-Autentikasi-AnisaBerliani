<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\registerConfirmation;
use Illuminate\Support\Facades\Storage;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'image_url' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image_url')){
            // $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('image_profile')->getClientOriginalExtension();
            // $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            // $path = $request->file('image_profile')->storeAs('public/photos', $filenameSimpan);

            $isi_gambar = $request->file('image_url');
            $fileName = $isi_gambar->hashName();
            // Image::configure(['driver' => 'imagick']);
            // $image = Image::make($isi_gambar)->resize(100, 100); //DI BAGIAN INI
            $isi_gambar->storeAs('public/photos', $fileName);

            
            $userAccount = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'image_url' => $fileName
            ]);
    
            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            $request->session()->regenerate();
            return redirect()->route('dashboard', $userAccount->id)
                ->withSuccess('You have successfully registered & logged in!');
        }else{
            return redirect()->route('register')
            ->withSuccess('GAGAL!');
        }
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            $accounts = User::latest()->paginate(3);
            return view('auth.dashboard', compact('accounts'));
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    public function edit(String $id){
        $accounts = User::where('id', $id)->first();
        return view('auth.edit', compact('accounts'));
    }

    public function update(Request $request, String $id){
        
        $accounts = User::findOrFail($id);

        if ($request->hasFile('image_url')) {

            $image = $request->file('image_url');

            $image->storeAs('public/photos', $image->hashName());

            Storage::delete('public/photos/'.$accounts->image_url);

            $accounts->update([
                'image_url'     => $image->hashName(),
                'name'   => $request->name,
                'email'   => $request->email,
            ]);

            return redirect()->route('dashboard')
                ->withSuccess('Profil berhasil terupdate.');
        } else {
            $accounts->update([
                'name'   => $request->name,
                'email'   => $request->email,
            ]);

            return redirect()->route('dashboard')
                    ->withSuccess('Profil berhasil terupdate.');
            }
    }

    public function delete(String $id){
        $accounts = User::find($id);
        Storage::delete('public/photos/'.$accounts->image_url);
        
        $accounts->update([
            'image_url'     => "",
        ]);

        return redirect()->route('dashboard')
                ->withSuccess('gambar berhasil di hapus.');
    }
}
