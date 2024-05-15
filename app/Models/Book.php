<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, Searchable;
    protected $with = ['authors', 'publisher'];

    protected $fillable = [
        'title',
        'summary',
    ];

    public function publisher(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'publisher_id');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'books_authors');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $with = [
            'authors',
        ];

        $this->loadMissing($with);

        return $this->toArray();
    }
}
