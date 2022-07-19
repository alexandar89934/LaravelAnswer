<?php

namespace App\Http\Controllers;
use App\Models\User;

class PageController extends Controller
{

    public function about()
    {
        return "About us Page";
    }

    public function contact()
    {
        return "Contact Page";
    }
    public function submitContact()
    {
        return "Submited Contact";
    }
    public function profile($id)
    {

        $user = User::with(['questions', 'answers', 'answers.question'])->findOrFail($id);
        return view('profile')->with('user', $user);
    }
}