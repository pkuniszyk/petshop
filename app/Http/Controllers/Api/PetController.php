<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Info(
 *     title="Laravel Pet API",
 *     version="1.0.0",
 *     description="API do zarządzania zwierzętami"
 * )
 *
 * @OA\PathItem(path="/api/pets")
 */

class PetController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/pets",
     *     summary="Get all pets",
     *     @OA\Response(
     *         response=200,
     *         description="A list of pets",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Pet"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(Pet::all(), 200);
    }

    /**
     * Przechowuje nowego zwierzaka w bazie danych.
     *
     * @param Request $request Żądanie HTTP zawierające dane zwierzęcia.
     * @return JsonResponse Nowo utworzony zasób.
     * @throws ValidationException Jeśli dane są niepoprawne.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $pet = Pet::create($validatedData);

        return response()->json($pet, 201);
    }

    /**
     * Pobiera informacje o konkretnym zwierzęciu.
     *
     * @param int $id ID zwierzęcia.
     * @return JsonResponse Szczegóły zwierzęcia lub błąd 404.
     */
    public function show(int $id): JsonResponse
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Nie znaleziono zwierzęcia'], 404);
        }

        return response()->json($pet, 200);
    }

    /**
     * Aktualizuje dane zwierzęcia.
     *
     * @param Request $request Żądanie HTTP zawierające dane do aktualizacji.
     * @param int $id ID zwierzęcia.
     * @return JsonResponse Zaktualizowane dane lub błąd 404.
     * @throws ValidationException Jeśli dane są niepoprawne.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Nie znaleziono zwierzęcia'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'type' => 'sometimes|string|max:255',
            'age' => 'sometimes|integer|min:0',
        ]);

        $pet->update($validatedData);

        return response()->json($pet, 200);
    }

    /**
     * Usuwa zwierzę z bazy danych.
     *
     * @param int $id ID zwierzęcia do usunięcia.
     * @return JsonResponse Komunikat potwierdzający lub błąd 404.
     */
    public function destroy(int $id): JsonResponse
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Nie znaleziono zwierzęcia'], 404);
        }

        $pet->delete();

        return response()->json(['message' => 'Usunięto zwierzę'], 200);
    }
}
