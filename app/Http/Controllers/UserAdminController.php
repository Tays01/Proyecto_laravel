<?php

namespace App\Http\Controllers;

use App\Models\InternalUser;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = InternalUser::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:internal_users,correo',
            'rol' => 'required|string|max:255',
        ]);

        InternalUser::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Usuario interno creado exitosamente.');
    }
}
