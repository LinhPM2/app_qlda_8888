<?php
namespace App\Interfaces\Services;
interface IGroupDetailService
{
    public function List();
    public function Add($request);
    public function Delete($request);
    public function Show(int $id);
}
?>
