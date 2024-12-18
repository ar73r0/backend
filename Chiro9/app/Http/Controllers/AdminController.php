<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\News;
use App\Models\ContactForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function showNews()
    {
        $newsItems = News::all();
        return view('admin.news', compact('newsItems'));
    }

    public function showContactForms()
    {
        // Haal alle contactformulieren op
        $contactForms = ContactForm::all();
        return view('admin.contact_forms', compact('contactForms'));
    }
}
