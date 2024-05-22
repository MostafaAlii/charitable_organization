<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admins';
    protected $fillable = ['name','email','password' ,'phone', 'status', 'password',];
    protected $hidden = ['remember_token',];
    protected $casts = ['email_verified_at' => 'datetime','password' => 'hashed',];

    public function scopeActive() {
        return $this->whereStatus('active')->get();
    }
}