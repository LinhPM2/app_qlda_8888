<?php
namespace App\Interfaces\Repositories;
interface IGroupDetailRepository {
    public function List();
    public function Add($request);
    public function Delete($request);
    public function Show(int $id);
}
?>
