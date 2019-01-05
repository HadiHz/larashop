<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use phpDocumentor\Reflection\Types\Array_;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable', 'categorizables', 'category_id', 'categorizable_id');
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public static function has_parent($id)
    {
        $category = Category::find($id);
        if ($category->parent_id != null) {
            return $category->parent_id;
        }
        return false;
    }

    private static function parentsId($id, $parentIds = [])
    {
//        dd(var_dump($ids));


        if (!self::has_parent($id)) {

            return $parentIds;
        }
//            dd(123);
        $parentIds[] = self::has_parent($id);

        return self::parentsId(self::has_parent($id), $parentIds);

    }

    public static function parentsIds($ids)
    {
        $pids = [];
        foreach ($ids as $id){
            $pids[] = intval($id);
        }

        foreach ($ids as $id) {
            $pids = array_merge($pids, self::parentsId($id));

        }

//        dd($pids);

        for($i = 0 ; $i < count($pids) - 1 ; $i++){
            if (in_array($pids[$i] , array_slice($pids , $i+1))){
                $pids[$i] = null;
            }
        }

        $pids = array_filter($pids , function ($number){
            return is_int($number);
        });

//        dd(array_values($pids));

        return array_values($pids);
    }

}
