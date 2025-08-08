<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index() {
        Alert::success('Berhasil', 'Login Berhasil!');
        return view('pages.admin.dashboard',[
            'pengaduan' => Pengaduan::count(),
            'user' => User::where('roles','=', 'USER')->count(),
            'petugas' => User::where('roles', '=', 'PETUGAS')->count(),
            'admin' => User::where('roles', '=', 'ADMIN')->count(),
            'tanggapan' => Tanggapan::count(),
            'pending' => Pengaduan::where('status', 'Belum di Proses')->count(),
            'process' => Pengaduan::where('status', 'Sedang di Proses')->count(),
            'success' => Pengaduan::where('status', 'Selesai')->count(),
        ]);
    }
}