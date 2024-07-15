<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->get();
        $admins = User::all();

        return view('admin',compact('categories','admins','contacts'));
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function search(Request $request)
    {
        $contacts=Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
