<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'prefecture', 'photo_path', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function users(): BelongsToMany
    {
        /*1. $this->belongsToMany(User::class, 'group_user')
$this->belongsToMany() is a method used in Laravel's Eloquent ORM to establish a many-to-many relationship between two models.
User::class refers to the User model. This is used here to specify that the relationship is with the User model, indicating that instances of the model where this method is defined (likely a Group model or similar) can have many associated users.
'group_user' is the name of the pivot table. Pivot tables are used in many-to-many relationships to store the foreign keys of both tables that are linked. If not specified, Laravel assumes a default naming convention based on the alphabetical order of the related model names (e.g., if linking Group and User, the default table name would be group_user). By specifying it explicitly, you control the database table name and can deviate from the default Laravel conventions if your database schema requires it.
2. ->withPivot('role')
->withPivot('role') is a method that specifies additional columns from the pivot table that should be included when fetching records from this relationship. By default, only the keys are fetched (group_id and user_id in this case).
'role' in the withPivot method indicates that the pivot table includes a column named role, which presumably holds information about the role or function of the user within the group (e.g., administrator, member, viewer). Including this column in the relationship data allows you to access it directly on the related models without having to make an additional query.*/
        return $this->belongsToMany(User::class)
            ->withPivot('role');
    }
}
