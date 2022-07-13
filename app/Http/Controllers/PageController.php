<?php

namespace App\Http\Controllers;

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
}