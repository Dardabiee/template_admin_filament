<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission;

class Userlevel extends Model
{
    //
    protected $table = "tbl_userlevel";
    protected $fillable = [
        'level_name'
    ];

    public function users(): HasMany {
        return $this->HasMany(User::class, 'userlevel_id');
    }

    public function permissions(): BelongsToMany{

            return $this->belongsToMany(
                Permission::class, 
                'role_has_permissions', 
                'role_id', 
                'permission_id'
                );
    }
}
