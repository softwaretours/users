<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'permission_groups';

}
