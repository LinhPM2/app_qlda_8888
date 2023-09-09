<?php

namespace App\Http\Repositories;

use App\Interfaces\Repositories\IDealerRepository;
use App\Models\dealer;
use Exception;
class DealerRepository implements IDealerRepository
{
    public function __construct(){}
    public function create($request){
        try{
            dealer::create([
                'dealerName'=>(string)$request->input('dealerName'),
                'gender'=>intval($request->input('gender')),
                'phoneNumber'=>$request->input('phoneNumber'),
                'dateOfBirth'=>date($request->input('dateOfBirth')),
                'country'=>$request->input('country'),
                'specificAddress'=>$request->input('specificAddress'),
                'businessItem'=>$request->input('businessItem')
            ]);
            return true;
        }catch(Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function update($request, $dealer){
        try {
            $dealer->dealerName = $request->input('dealerName');
            $dealer->gender = $request->input('gender');
            $dealer->phoneNumber = $request->input('phoneNumber');
            $dealer->dateOfBirth = date($request->input('dateOfBirth'));
            $dealer->country = $request->input('country');
            $dealer->specificAddress = $request->input('specificAddress');
            $dealer->businessItem = $request->input('businessItem');
            $dealer->save();
            Session()->flash('success', 'Sửa thông tin thành công');
        } catch (Exception $ex) {
            Session()->flash('error', $ex->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $dealer = dealer::where('id', $request->input('id'))->first();
        if ($dealer) {
            $dealer->delete();
            return true;
        }
        return false;
    }

}
