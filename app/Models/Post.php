<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'category_id',
        'user_id',
        'slug',
        'thumbnail'
    ];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn($query)=>
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt','like', '%' . $search . '%'));
            }
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category))
            );

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn($query) =>
            $query->where('username', $author))
        );
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function incrementViewCount() {
        $this->view_count++;
        return $this->save();
    }

}
