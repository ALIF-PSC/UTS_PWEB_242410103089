<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        session([
            'user_name' => $username,
            'user_email' => $username . '@finance.app',
            'is_logged_in' => true
        ]);

        return redirect('/dashboard');
    }

    public function showDashboard()
    {
        if (!session('is_logged_in')) {
            return redirect('/login');
        }

        $transactions = session('user_transactions', []);
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($transactions as $trx) {
            if ($trx['jenis'] == 'masuk') {
                $total_masuk += $trx['jumlah'];
            } else {
                $total_keluar += $trx['jumlah'];
            }
        }

        $saldo = $total_masuk - $total_keluar;
        $ada_data = count($transactions) > 0;

        return view('dashboard', [
            'nama_user' => session('user_name'),
            'saldo' => $saldo,
            'total_masuk' => $total_masuk,
            'total_keluar' => $total_keluar,
            'transaksi' => $transactions,
            'ada_data' => $ada_data
        ]);
    }

    public function showPengelolaan()
    {
        if (!session('is_logged_in')) {
            return redirect('/login');
        }

        $transactions = session('user_transactions', []);

        return view('pengelolaan', [
            'nama_user' => session('user_name'),
            'data_transaksi' => $transactions
        ]);
    }

    public function tambahTransaksi(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'jumlah' => 'required|numeric',
            'jenis' => 'required'
        ]);

        $transactions = session('user_transactions', []);

        $transaksi_baru = [
            'id' => time(),
            'keterangan' => $request->keterangan,
            'jumlah' => (int) $request->jumlah,
            'jenis' => $request->jenis,
            'tanggal' => date('Y-m-d')
        ];

        $transactions[] = $transaksi_baru;
        session(['user_transactions' => $transactions]);

        return back()->with('pesan', 'Transaksi berhasil disimpan');
    }

    public function hapusTransaksi($id_transaksi)
    {
        $transactions = session('user_transactions', []);

        $transactions_baru = [];
        foreach ($transactions as $trx) {
            if ($trx['id'] != $id_transaksi) {
                $transactions_baru[] = $trx;
            }
        }

        session(['user_transactions' => $transactions_baru]);

        return back()->with('pesan', 'Transaksi dihapus');
    }

    public function showProfile()
    {
        if (!session('is_logged_in')) {
            return redirect('/login');
        }

        $transactions = session('user_transactions', []);

        return view('profile', [
            'nama_user' => session('user_name'),
            'email_user' => session('user_email'),
            'total_transaksi' => count($transactions),
            'tanggal_gabung' => '2024-01-01'
        ]);
    }

    public function processLogout()
    {
        session()->flush();
        return redirect('/login')->with('pesan', 'Anda sudah logout');
    }
}
