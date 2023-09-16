<?php
namespace App\Http\Service;

use App\Interfaces\Repositories\IGroupDealerRepository;
use App\Interfaces\Services\IGroupService;
class GroupService implements IGroupService{
    public function __construct(private IGroupDealerRepository $groupRepo){

    }
    public function List(){
        return $this->groupRepo->List();
    }
    public function Create($request){
        return $this->groupRepo->Create($request);
    }
    public function EditGroup($request,$groupDealer){
        return $this->groupRepo->EditGroup($request,$groupDealer);
    }
    public function Delete($request){
        return $this->groupRepo->Delete($request);
    }

}
?>
