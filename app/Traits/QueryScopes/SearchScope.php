<?php

namespace App\Traits\QueryScopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

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
                $res->where(strval($key), 'ilike', '%' . strval($value) . '%')
                : $res->orWhere(strval($key), 'ilike', '%' . strval($value) . '%');
            $count++;
        }
        return empty($filter) ? $query : $res;
    }
    /**
     * Sử dụng trait này để tìm kiếm 1 giá trị trên tất cả các cột kiểu <strong>CHAR</strong>
     * @param Builder $query param này không cần nhập
     * @param string $searchValue là giá trị cần tìm kiếm
     * @param string $modelNamespace là namespace của model
     * @example <caption> Cách sử dụng </caption>
     *  ``` User::textSearch(["name"=>"John", "roles"=>"Admin"]) ```
     * + => return User
     */
    public function scopeSearchAll(Builder $query, string $searchValue, string $modelNamespace)
    {   $res = $query;
        if ($searchValue == null || trim($searchValue)=="") {
            return $query;
        }
        $columns = Schema::getColumnListing(app($modelNamespace)->getTable());
        for ($i=0; $i < count($columns) ; $i++) {
            $res = ($i == 1) ?
                $res->where(strval($columns[$i]), 'ilike', '%' . strval($searchValue) . '%')
                : $res->orWhere(strval($columns[$i]), 'ilike', '%' . strval($searchValue) . '%');
        }
        return $query;
    }
}
