<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $column_name, string $operator, string $value)
 */
class MyFirstModel extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $fillable = ['name', 'type'];

}
