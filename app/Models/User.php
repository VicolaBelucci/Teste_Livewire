<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $role)
    {
        return $this->roles()->whereName($role)->exists();
    }

    public function hasRoles(array $nomes)
    {
        return $this->roles()->whereIn('name', $nomes)->exists();
    }

    public function hasPermission(string $permission)
    {
        // return $this->roles->filter( fn($role)=> $role->permissions()->whereName($permission)->exists())->count();
        return $this->roles()
            ->whereHas('permissions', function($query) use ($permission){
                $query->whereName($permission);
            })
            ->count();

        /*
            Busca todas as roles do usuário e busca todas as permissões de cada role, verificando se a permissão
            passada no parâmetro existe em alguma dessas roles, caso existir, o método count() retorna o número 
            de roles que possuem aquela permissão e, se existir, é diferente de 0, podendo ser considerado como 
            'true'. 
        */
    }
}
