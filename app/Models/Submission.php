<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Submission extends Model
{
    /** @use HasFactory<\Database\Factories\SubmissionFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'message',
        'submitted_at',
        'is_spam',
        'department_id',
    ];

    protected $hidden = [
        'is_spam',
        'department_id',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'is_spam' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
