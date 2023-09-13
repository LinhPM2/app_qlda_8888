<?php

namespace App\Http\Repositories;

use App\Interfaces\Repositories\IOtherContactRepository;
use App\Models\otherContact;
use Exception;
class OtherContactRepository implements IOtherContactRepository
{
    public function __construct(){}
    public function create($request){
        try{
            otherContact::create([
                'fullName'=>(string)$request->input('fullName'),
                'dateOfBirth'=>date($request->input('dateOfBirth')),
                'gender'=>intval($request->input('gender')),
                'phoneNumber'=>$request->input('phoneNumber'),
                'IDDealer'=>$request->input('IDDealer'),
            ]);
            session()->flash('success','thêm mới thành công');
            return true;
        }catch(Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function update($request, $otherContact){
        try {
            $otherContact->fullName = $request->input('fullName');
            $otherContact->dateOfBirth = date($request->input('dateOfBirth'));
            $otherContact->gender = $request->input('gender');
            $otherContact->phoneNumber = $request->input('phoneNumber');
            $otherContact->IDDealer = $request->input('IDDealer');
            $otherContact->save();
            Session()->flash('success', 'Sửa thông tin thành công');
        } catch (Exception $ex) {
            Session()->flash('error', $ex->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $otherContact = otherContact::where('id', $request->input('id'))->first();
        if ($otherContact) {
            $otherContact->delete();
            return true;
        }
        return false;
    }

    public function getAll(){
        return otherContact::query();
    }

}
