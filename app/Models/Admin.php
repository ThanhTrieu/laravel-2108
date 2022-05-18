<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 1,
        'gender' => 0
    ];

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // chi dinh ro thuoc tinh nao dc dung mass assignable.
    protected $fillable = ['username', 'password', 'email', 'phone', 'fullname', 'address', 'birthday'];

    // bat ky thuoc tinh nao deu khong bi mass assignable chi phoi
    // protected $guarded = [];
    // khong the su dung dong thoi ca 2 duoc


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role', 'admin_id', 'role_id');
    }
}
