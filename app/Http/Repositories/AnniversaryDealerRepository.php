<?php

namespace App\Http\Repositories;

use App\Interfaces\Repositories\IAnniversaryDealerRepository;
use App\Models\anniversaryDealer;
use App\Models\dealer;
use App\Models\otherContact;
use Exception;
class AnniversaryDealerRepository implements IAnniversaryDealerRepository
{
    public function __construct(){}
    public function create($request){
        try{
            anniversaryDealer::create([
                'name'=>$request->input('name'),
                'eventDate'=>date($request->input('eventDate')),
                'IDDealer'=>$request->input('IDDealer'),
            ]);
            session()->flash('success','thêm mới thành công');
            return true;
        }catch(Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function update($request, $anniversary){
        try {
            $anniversary->name = $request->input('name');
            $anniversary->eventDate = date($request->input('eventDate'));
            $anniversary->IDDealer = $request->input('IDDealer');
            $anniversary->save();
            Session()->flash('success', 'Sửa thông tin thành công');
        } catch (Exception $ex) {
            Session()->flash('error', $ex->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $anniversary = anniversaryDealer::where('id', $request->input('id'))->first();
        if ($anniversary) {
            $anniversary->delete();
            return true;
        }
        return false;
    }

    public function getAll(){
        return anniversaryDealer::query();
    }

}
