<?php

namespace App\Traits\QueryScopes;

use Illuminate\Database\Eloquent\Builder;

trait SearchScope
{
    /**
     * Sử dụng trait này để tìm kiếm 1 giá trị hoặc tổ hợp các giá trị trên cột kiểu <strong>CHAR</strong>
    * @param Builder $query param này không cần nhập
    * @param array{textcolum:int, searchValue:string} $filter array với tên cột làm key và value là giá trị cần tìm kiếm
    * @example <caption> Cách sử dụng </caption>
    *  ``` User::textSearch(["name"=>"John", "roles"=>"Admin"]) ```
    * + => return User 
    */
    public function scopeTextSearch(Builder $query, $filter = [])
    {
        $res = $query;
        $count = 1;
        foreach ($filter as $key => $value) {
            $res = ($count == 1) ?
                $res->where(strval($key), 'like', '%'.strval($value).'%')
                : $res->orWhere(strval($key), 'like', '%' . strval($value) . '%');
            $count++;
        }
        return empty($filter) ? $query : $res;
    }
}
