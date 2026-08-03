<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title', 'description', 'type', 'status', 'support_file', 'date_start'];

    // Les utilisateurs inscrits à cette activité
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}