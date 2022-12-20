<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permohonan;

class HomeController extends Controller
{
    public function index()
    {
        $jmlhUser = User::all()->count();
        $jmlhPermohonan = Permohonan::all()->count();
        return view('welcome', compact('jmlhUser', 'jmlhPermohonan'));
    }
    public function about()
    {
        return view('about');
    }
    public function unduhan()
    {
        return view('unduhan');
    }
    public function search()
    {
        return view('search');
    }
}
