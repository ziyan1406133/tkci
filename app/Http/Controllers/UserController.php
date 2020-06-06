<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Article\Article;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'show_author']]);
        $this->middleware('super_admin', ['except' => ['show', 'edit', 'update', 'show_author']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backsite.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'unique:users,username',
            'email' => 'unique:users,email',
            'image' => 'image|max:1999',
            'password1' => 'same:password'
        ],
        [
            'same' => 'Konfirmasi password tidak sesuai',
            'username.unique' => 'Username sudah digunakan',
            'email.unique' => 'Email sudah digunakan',
            'image.image' => 'File yang diupload harus berupa gambar',
            'max' => 'Maksimum ukuran file yang diupload adalah 2 MB'
        ]);

        $admin = new User;
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->bio = $request->bio;
        $admin->facebook = $request->facebook;
        $admin->twitter = $request->twitter;
        $admin->instagram = $request->instagram;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/user/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $admin->image = "images/user/".$FileNameToStore;
        }
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Akun Berhasil Diperbaharui');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $admin = User::where('username', $username)->first();
        return view('pages.backsite.admin.show', compact('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_author($username)
    {
        $admin = User::where('username', $username)->first();
        
        $random_artikel = Article::where('status', 'Published')->inRandomOrder()->limit(6)->get();

        return view('pages.frontsite.show_author', compact('admin', 'random_artikel'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role !== 'Super Admin') {
            if (Auth::user()->id !== $id) {
                return redirect()->route('admin.dashboard')->with('error', 'Unauthorized Access');
            }
        }

        $admin = User::findOrFail($id);
        return view('pages.backsite.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $email = $request->email;
        $username = $request->username;
        $admin = User::findOrFail($id);

        if (($admin->email == $email) && ($admin->username == $username)) {
            $this->validate($request, [
                'image' => 'image|max:1999',
                'password1' => 'same:password'
            ],
            [
                'image.image' => 'File yang diupload harus berupa gambar',
                'max' => 'Maksimum ukuran file yang diupload adalah 2 MB',
                'same' => 'Konfirmasi password tidak sesuai',
            ]);
        } elseif(($admin->email !== $email) && ($admin->username == $username)) {
            $this->validate($request, [
                'image' => 'image|max:1999',
                'email' => 'unique:users,email',
                'password1' => 'same:password'
            ],
            [
                'image.image' => 'File yang diupload harus berupa gambar',
                'max' => 'Maksimum ukuran file yang diupload adalah 2 MB',
                'same' => 'Konfirmasi password tidak sesuai',
                'email.unique' => 'Email sudah digunakan'
            ]);
        } elseif(($admin->email == $email) && ($admin->username !== $username)) {
            $this->validate($request, [
                'image' => 'image|max:1999',
                'username' => 'unique:users,username',
                'password1' => 'same:password'
            ],
            [
                'image.image' => 'File yang diupload harus berupa gambar',
                'max' => 'Maksimum ukuran file yang diupload adalah 2 MB',
                'same' => 'Konfirmasi password tidak sesuai',
                'username.unique' => 'Username sudah digunakan'
            ]);
        } else {
            $this->validate($request, [
                'image' => 'image|max:1999',
                'email' => 'unique:users,email',
                'username' => 'unique:users,username',
                'password1.unique' => 'same:password'
            ],
            [
                'image.image' => 'File yang diupload harus berupa gambar',
                'max' => 'Maksimum ukuran file yang diupload adalah 2 MB',
                'same' => 'Konfirmasi password tidak sesuai',
                'username.unique' => 'Username sudah digunakan',
                'email.unique' => 'Email sudah digunakan'
            ]);
        }
        
        
        $admin->name = $request->name;
        $admin->username = $username;
        $admin->email = $email;
        if($request->password !== null) {
            $admin->password = Hash::make($request->password);
        }
        $admin->bio = $request->bio;
        $admin->facebook = $request->facebook;
        $admin->twitter = $request->twitter;
        $admin->instagram = $request->instagram;
        if($request->hasFile('image')){
            if($admin->image !== 'images/user/no_avatar.png') {
                $file = public_path($admin->image);
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $FileNameToStore = $filename.'_'.time().'_.'.$extension;
            $path = public_path('images/user/');
            $request->file('image')->move($path, $FileNameToStore);

            //$path = $request->file('image')->storeAs('public/package/', $FileNameToStore);

            $admin->image = "images/user/".$FileNameToStore;
        }
        $admin->save();

        return redirect()->route('admin.show', $username)->with('success', 'Akun Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        if($admin->image !== 'images/user/no_avatar.png') {
            $file = public_path($admin->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Akun Admin Berhasil Dihapus');
    }
}
