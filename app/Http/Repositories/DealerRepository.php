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
        }catch(Exception $ex){
            Session()->flash('error',$ex->getMessage());
        }
        return null;
    }

}
