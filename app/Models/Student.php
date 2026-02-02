<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'email',
        'gender',
        'course',
        'year_level',
    ];

    public function generateStudentId()
    {
        $this->student_id = sprintf(
            '%s-%04d-%03d',
            now()->year,
            $this->id,
            random_int(100, 999)
        );
        $this->save();
    }

    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where(function ($q) use ($term) {
                foreach (['first_name', 'last_name', 'email', 'student_id'] as $col) {
                    $q->orWhere($col, 'like', "%$term%");
                }
            });
        }
    }
}
