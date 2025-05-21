<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    /** @use HasFactory<\Database\Factories\ApiKeyFactory> */
    use HasFactory;

    public function updateUsedAt(): void
    {
        $this->last_used_at = now();
        $this->save();
    }
}
