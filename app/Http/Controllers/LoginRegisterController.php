<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\datacvs;
use App\Http\Controllers\Controller;
use App\Mail\regisConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'dashboards', 'edit', 'update', 'delete'
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
            'image_profile' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image_profile')){
           
            $image = $request->file('image_profile');

            $folderPathOriginal = public_path('storage/photos/original');
            $folderPathThumbnail = public_path('storage/photos/thumbnail');
            $folderPathSquare = public_path('storage/photos/square');

            if (!File::isDirectory($folderPathOriginal)) {
                File::makeDirectory($folderPathOriginal, 0777, true, true);
            }
            if (!File::isDirectory($folderPathThumbnail)) {
                File::makeDirectory($folderPathThumbnail, 0777, true, true);
            }
            if (!File::isDirectory($folderPathSquare)) {
                File::makeDirectory($folderPathSquare, 0777, true, true);
            }

            $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_profile')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            // Simpan gambar asli
            $path = $request->file('image_profile')->storeAs('photos/original', $filenameSimpan);

            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameSimpan);
            Image::make($image)
                ->fit(150, 150)
                ->save($thumbnailPath);

            // Buat versi persegi dengan lebar dan tinggi yang sama
            $squarePath = public_path('storage/photos/square/' . $filenameSimpan);
            Image::make($image)
                ->fit(300, 300)
                ->save($squarePath);
                
        }
        else {
            $path = null;
        }

        $userAccount = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'image_profile' => $filenameSimpan
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        // return redirect()->route('dashboard', $userAccount->id)
        //     ->withSuccess('You have successfully registered & logged in!');
        return redirect()->route('dashboards')
            ->withSuccess('You have successfully registered & logged in!');
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

            $accounts = User::where('email', $request->email)->first();

            if ($accounts) {
                $request->session()->regenerate();

                // return redirect()->route('dashboard', $accounts->id)
                //     ->withSuccess('You have successfully logged in!');

                return redirect()->route('dashboards')
                    ->withSuccess('You have successfully logged in!');

            } else {
                return back()->withErrors([
                    'email' => 'Your provided credentials do not match in our records.',
                ])->onlyInput('email');
            }
        } else {
            return back()->withErrors([
                'email' => 'Your provided credentials do not match in our records.',
            ])->onlyInput('email');
        }
    }

    public function dashboards(){
        $datas = User::all();
        return view('auth.dashboard', compact('datas'));
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        if (Auth::check()) {
            $datas = User::find()->get();
            return view('auth.dashboard', compact('datas'));
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
        session_start();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session_destroy();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }


    public function edit(Request $request, String $id){

        $accounts = User::find($id)->first();
        return view('auth.edit', compact('accounts'));

    }

    public function update(Request $request, String $id){

        $accounts = User::findOrFail($id);

        if ($request->hasFile('image_profile')) {
            $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_profile')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            $photo = $accounts->image_profile;

            // Hapus gambar asli
            $originalPath = public_path('storage/photos/original/' . $photo);
            if (File::exists($originalPath)) {
                File::delete($originalPath);
            }
            //simpan gambar asli
            $path = $request->file('image_profile')->storeAs('photos/original', $filenameSimpan);

            // Hapus gambar thumbnail
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }

            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameSimpan);
            Image::make($request->image_profile)
                ->fit(150, 150)
                ->save($thumbnailPath);

            // Hapus gambar square
            $squarePath = public_path('storage/photos/square/' . $photo);
            if (File::exists($squarePath)) {
                File::delete($squarePath);
            }

            // Buat versi square dengan lebar dan tinggi yang sama
            $squarePath = public_path('storage/photos/square/' . $filenameSimpan);
            Image::make($request->image_profile)
                ->fit(300, 300)
                ->save($squarePath);

            $path = $filenameSimpan;

            $accounts->update([
                'image_profile'     => $filenameSimpan,
                'name'   => $request->name,
                'email'   => $request->email,
            ]);

            return redirect()->route('dashboards')
                ->withSuccess('Profil berhasil terupdate.');

        } else {

            $accounts->update([
                'name'   => $request->name,
                'email'   => $request->email,
            ]);

            return redirect()->route('dashboards')
                    ->withSuccess('Profil berhasil terupdate.');
            }
    }

    public function delete(String $id){

        $accounts = User::find($id);

        if (!$accounts) {
            return redirect()->route('users')->with('error', 'User not found');
        }

        $photo = $accounts->photo;

          // Hapus gambar asli
          $originalPath = public_path('storage/photos/original/' . $photo);
          if (File::exists($originalPath)) {
              File::delete($originalPath);
          }

          // Hapus gambar thumbnail
          $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
          if (File::exists($thumbnailPath)) {
              File::delete($thumbnailPath);
          }

          // Hapus gambar square
          $squarePath = public_path('storage/photos/square/' . $photo);
          if (File::exists($squarePath)) {
              File::delete($squarePath);
          }

        $accounts->update([
            'image_profile'     => null,
        ]);

        return redirect()->route('dashboards')
                ->withSuccess('gambar berhasil di hapus.');
    }
}