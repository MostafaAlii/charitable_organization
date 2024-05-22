<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PersonalStatus extends Model {
    use HasFactory;
    protected $table = 'personal_statuses';
    protected $fillable = [
        'name',
        'nationality_id',
        'family_code',
        'address',
        'wife_name',
        'phone',
        'children_number',
        'notes',
        'admin_id',
        'section_id',
    ];

    public static function generateUniqueFamilyCode() {
        $familyCode = '';
        do {
            $familyCode = 'FAM_' . rand(1000, 9999);
        } while (static::where('family_code', $familyCode)->exists());
        return $familyCode;
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
