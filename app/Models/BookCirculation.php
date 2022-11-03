<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCirculation extends Model
{
    use HasFactory;

    protected $casts = [
        'issue_date' => 'date:Y-m-d',
        'return_date' => 'date:Y-m-d',
    ];

    const CIRCULATION_STATUS = [
        'Issued' => 'Issued',
        'Returned' => 'Returned'
    ];

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class)
            ->withTranslation()
            ->translatedIn(app()->getLocale());
    }

        /**
         * @return mixed
         */
        public function book(){
            return $this->belongsTo(Book::class)
                ->withTranslation()
                ->translatedIn(app()->getLocale());
        }
}
