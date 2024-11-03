<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Program;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class VoluntExpensesController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role->id !== 3) {
            return redirect()->route('401')->with('error', 'No tienes acceso a esta página.');
        }

        // Retrieve all records from the 'programs' table
        $expenses = Expenses::all();

        // Pass the retrieved data to the Inertia view
        return Inertia::render('Volunt/Index', [
            'expenses' => $expenses
        ]);
    }
}
