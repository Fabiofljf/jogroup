<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dettail extends Model
{

    protected $fillable = ['school', 'argoment', 'title', 'year_from', 'year_to', 'vote', 'person_id'];


    /**
     * The services that belong to the Apartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person(): BelongsTo
    {
        return $this->BelongsTo(Person::class);
    }
}
