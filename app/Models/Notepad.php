<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Notepad extends Model
{
    protected $table = 'notepads';
    protected $guarded = ['']; //không bảo vệ trường nào thông thường k update dòng nào thì nhét vào

    public function category()
    {
        return $this->belongsTo(Category::class,'np_category_id');
    }
}
