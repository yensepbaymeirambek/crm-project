<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    use HasFactory;

    public function employee()
    {
        return $this->hasOne(Employees::class, 'company_id');
    }
}
