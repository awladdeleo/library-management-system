<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCirculation extends Model
{
    use HasFactory;

    const CIRCULATION_STATUS = [
        'Issued' => 'Issued',
        'Returned' => 'Returned'
    ];
}
