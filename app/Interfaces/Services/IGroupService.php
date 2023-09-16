<?php
namespace App\Interfaces\Services;
interface IGroupService
{
    public function List();
    public function Create($request);
    public function Delete($request);
    public function EditGroup($request,$groupDealer);
}
?>
