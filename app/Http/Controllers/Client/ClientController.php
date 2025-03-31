<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $user = Auth::user();
        $templateView = 'layouts.client.templates.home';
        return view('layouts.client.index', compact('templateView','user'));
    }


    public function viewInformation() {
        $user = Auth::user();
        $templateView = 'layouts.client.templates.information';
        return view('layouts.client.index', compact('templateView','user'));
    }
}
