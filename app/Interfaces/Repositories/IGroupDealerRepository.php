<?php
namespace App\Interfaces\Repositories;
interface IGroupDealerRepository {
    public function Create($request);
    public function EditGroup($request,$groupDealer);
    public function Delete($request);
    public function List();
}
?>
