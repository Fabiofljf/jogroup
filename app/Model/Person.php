<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    protected $fillable = ['name', 'surname', 'gender', 'email', 'date_of_birth'];

    /**
     * The user that has one the dettail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dettail(): HasOne
    {
        return $this->hasOne(Dettail::class);
    }
}
