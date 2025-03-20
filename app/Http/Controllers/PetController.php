<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

/**
 * PetController - Kontroler do zarządzania zwierzętami
 *
 * @package App\Http\Controllers
 */
class PetController extends Controller
{
    /**
     * Wyświetl listę zwierząt.
     *
     * @return \Illuminate\View\View Widok z listą zwierząt
     */
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    /**
     * Wyświetl formularz do dodawania nowego zwierzęci.
     *
     * @return \Illuminate\View\View Formularz dodawania nowego zwierzęcia
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Zapisz nowego zwierzęcia w bazie danych.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse Przekierowanie do listy zwierząt
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'species' => 'string|required',
            'age' => 'integer|required',
        ]);

        Pet::create($validated);

        return redirect()->route('pets.index');
    }

    /**
     * Wyświetl formularz edycji dla danego zwierzęcia.
     *
     * @param  int  $id ID zwierzęcia do edycji
     * @return \Illuminate\View\View Formularz edycji dla zwierzęcia
     */
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet'));
    }

    /**
     * Zaktualizuj dane istniejącego zwierzęcia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id ID zwierzęcia do zaktualizowania
     * @return \Illuminate\Http\RedirectResponse Przekierowanie do listy zwierząt
     */
    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|required',
            'species' => 'string|required',
            'age' => 'integer|required',
        ]);

        $pet->update($validated);

        return redirect()->route('pets.index');
    }

    /**
     * Usuń zwierzęcia z bazy danych.
     *
     * @param  int  $id ID zwierzęcia do usunięcia
     * @return \Illuminate\Http\RedirectResponse Przekierowanie do listy zwierząt
     */
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets.index');
    }
}
