<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 'USER') {
            $user = Auth::user();
            return view('pages.masyarakat.index', ['liat'=>$user]);
        } else {
            $user = Auth::user()->nik;
            $masyarakats = User::where('roles', 'USER')->get();
            return view('pages.admin.masyarakat', compact('masyarakats'));
        }
    }


    public function cariMasyarakat(Request $request)
    {
        $cari = $request->input('cari');

        $masyarakats = User::where('roles', 'USER')
            ->where(function ($query) use ($cari) {
                $query->where('name', 'like', "%$cari%")
                    ->orWhere('email', 'like', "%$cari%")
                    ->orWhere('nik', 'like', "%$cari%");
            })
            ->get();

        return view('pages.admin.masyarakat', compact('masyarakats'))
            ->with('cari', $cari);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createMasyarakat()
    {
        return view('pages.admin.masyarakat.create');
    }

    public function storeMasyarakat(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:users,nik',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:11|max:12',
            'password' => 'required|string|min:6|confirmed',
        ], [
        'nik.required' => 'NIK tidak boleh kosong.',
        'name.required' => 'Nama tidak boleh kosong.',
        'email.required' => 'Email tidak boleh kosong.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah ada.',
        'phone.required' => 'Nomor HP tidak boleh kosong.',
        'password.required' => 'Password tidak boleh kosong.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'password.min' => 'Password minimal 8 karakter.',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['roles'] = 'USER';

        User::create($data);

        Alert::success('Berhasil', 'Masyarakat berhasil ditambahkan');
        return redirect()->route('admin.masyarakat');
    }


    public function editMasyarakat($id)
    {
        $masyarakat = User::findOrFail($id);
        return view('pages.admin.masyarakat.edit', compact('masyarakat'));
    }

    public function updateMasyarakat(Request $request, $id)
    {
        $masyarakat = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$masyarakat->id,
        ]);

        $masyarakat->update([
            'name' => $request->name,
            'email' => $request->email,
            // tambahkan update password jika diperlukan
        ]);

        Alert::success('Berhasil', 'Data masyarakat berhasil diubah');
        return redirect()->route('admin.masyarakat');
    }

    public function destroyMasyarakat($id)
    {
        $masyarakat = User::findOrFail($id);
        $masyarakat->delete();

        Alert::success('Berhasil', 'Data masyarakat berhasil dihapus');
        return redirect()->route('admin.masyarakat');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'description' => 'required',
        'image' => 'required',
        ]);

        $nik = Auth::user()->nik;
        $id = Auth::user()->id;
        $name = Auth::user()->name;

        $data = $request->all();
        $data['user_nik']=$nik;
        $data['user_id']=$id;
        $data['name']=$name;
        $data['image'] = $request->file('image')->store('assets/laporan', 'public');

        Alert::success('Berhasil', 'Pengaduan terkirim');
        Pengaduan::create($data);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function lihat() {


        // $user = Auth::user()->pengaduan()->get();
        $user = Auth::user()->nik;


        $items = Pengaduan::all();

        return view('pages.masyarakat.detail', [
            'items' => $items
        ]);

    }

    public function show($id)
    {
        $item = Pengaduan::with([
        'details', 'user'
        ])->findOrFail($id);

        $tangap = Tanggapan::where('pengaduan_id',$id)->first();

        return view('pages.masyarakat.show',[
        'item' => $item,
        'tangap' => $tangap
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
