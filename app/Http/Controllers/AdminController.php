<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    function admin_list(){
        $users = User::all();

        // Mengembalikan view dengan data users
        return view('tampilan.admin', compact('users'));
    }

    public function tampilan_awal()
    {
        $project = Project::all();
        return view('tampilan.index',compact('project'));
    }

    public function rekrutment(){
        return view('tampilan.rekrutment');
    }
}
