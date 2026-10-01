<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'title',
        'url',
        'icon',
        'order',
        'is_active'
    ];

        /**
     * Get all of the comments for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class, 'menu_id');
    }

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // relasi ke parent menu(1 Tingkat diatasny)
    public function parent() {
        return @$this->belongsTo(Menu::class, 'parent_id');
    }

    // relasi ke child menu (1 tingkat dibawahnya)
    public function children() {
        return $this->hasMany(Menu::class, 'parent_id')->where(
            'is_active', true)->orderBy('order', 'asc');
    }

    // relasi ke cucu, cicit menu dst
    public function childrenRecursive() {
        return $this->children()->with('childrenRecursive');
    }
}
