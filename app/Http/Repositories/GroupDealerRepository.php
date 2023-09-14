<?php

namespace App\Http\Repositories;

use App\Interfaces\IUserRepository;
use App\Interfaces\Repositories\IGroupDealerRepository;
use App\Models\groupDealer;
use App\Models\groupDetailDealer;
use Exception;
use Illuminate\Support\Facades\DB;

class GroupDealerRepository implements IGroupDealerRepository
{
    public function Create($request){
        try{
            groupDealer::create([
                'groupName'=>(string)$request->input('groupName'),
            ]);
            return true;
        }catch(Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }
    public function EditGroup($request,$groupDealer){
        try {
            $groupDealer->groupName = $request->input('groupName');
            $groupDealer->save();
            Session()->flash('success', 'Sửa thông tin thành công');
        } catch (Exception $ex) {
            Session()->flash('error', $ex->getMessage());
            return false;
        }
        return true;
    }
    public function Delete($request){
        $dealer = groupDealer::where('id', $request->input('id'))->first();
        if ($dealer) {
            groupDetailDealer::where('groupid',$request->input('id'))->delete();
            $dealer->delete();
            return true;
        }
        return false;
    }
    public function List(){
        return request()->search != null ?
             groupDealer::where('groupName','like','%'.request()->search.'%')->paginate(12)->withQueryString()

        :
             groupDealer::paginate(12)->withQueryString();

    }

}
