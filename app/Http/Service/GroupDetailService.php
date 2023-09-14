<?php
namespace App\Http\Service;

use App\Interfaces\Repositories\IGroupDetailRepository;
use App\Interfaces\Services\IGroupDetailService;
class GroupDetailService implements IGroupDetailService{
    public function __construct(private IGroupDetailRepository $groupDetailRepo){

    }
    public function List(){
        return $this->groupDetailRepo->List();
    }
    public function Add($request){
        return $this->groupDetailRepo->Add($request);
    }
    public function Delete($request){
        return $this->groupDetailRepo->Delete($request);
    }
    public function Show(int $id){
        return $this->groupDetailRepo->Show($id);
    }
}
?>
