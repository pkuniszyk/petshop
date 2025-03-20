<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Pet",
 *     type="object",
 *     required={"name", "type", "age"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Reksio"),
 *     @OA\Property(property="type", type="string", example="Pies"),
 *     @OA\Property(property="age", type="integer", example=5)
 * )
 */


class Pet extends Model
{
    use HasFactory;

    /**
     * Atrybuty, które mogą być wypełnione masowo (mass assignment)
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'species',
        'age'
    ];
}
