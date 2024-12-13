<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // Import HasRoles trait
use PragmaRX\Google2FA\Google2FA;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google2fa_secret',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    /**
     * @method bool hasGoogle2faEnabled()
     * @method string generateGoogle2faSecret()
     */
    
    public function generateGoogle2faSecret()
    {
        $google2fa = new Google2FA();
        $this->google2fa_secret = $google2fa->generateSecretKey();
        $this->save();
        
        dd(get_class_methods($this));
        return $this->google2fa_secret;
    }

    public function hasGoogle2faEnabled()
    {
        return !is_null($this->google2fa_secret);
    }


}
