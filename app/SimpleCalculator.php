<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpleCalculator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Input1', 'Input2', 'Operand', 'Result',
    ];
}
