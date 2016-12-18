<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    protected $table = 'role_user';

}
