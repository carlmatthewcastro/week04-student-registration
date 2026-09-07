<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model {
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'mobile_number',
        'date_of_birth',
        'gender',
        'program',
        'year_level',
        'address',
        'profile_picture'
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    public function getFirstNameAttribute(?string $value): ?string
    {
        return $value === null ? null : Str::title($value);
    }

    public function getMiddleNameAttribute(?string $value): ?string
    {
        return $value === null ? null : Str::title($value);
    }

    public function getLastNameAttribute(?string $value): ?string
    {
        return $value === null ? null : Str::title($value);
    }

    public function getInitialsAttribute(): string
    {
        return collect([$this->first_name, $this->middle_name, $this->last_name])
            ->filter()
            ->map(fn (string $name): string => Str::upper(Str::substr($name, 0, 1)))
            ->implode('');
    }
}