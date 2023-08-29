<?php

namespace App\Http\Controllers;

use App\Models\dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    

    public function index(){
        return view('admin.dealer.list',[
            'title' => 'Danh sách Đại lý'
        ]);
    }

    public function getList(Request $request){
        $list = array();
        if(!empty($request->searchValue)){
            switch ($request->typeSearch){
                case "dealerName":
                    $list = dealer::where('dealerName','like','%'.$request->searchValue.'%')->get();
                    break;
                case "phoneNumber":
                    $list = dealer::where('phoneNumber','like','%'.$request->searchValue.'%')->get();
            }
        } else {
            $list = dealer::get();
        }

        if ($request->orderBy == "desc") {
            switch ($request->orderType) {
                case "dealerName":
                    $list = collect($list)->sortByDesc('dealerName')->values()->all();
                    break;
                case "phoneNumber":
                    $list = collect($list)->sortByDesc('phoneNumber')->values()->all();
                    break;
            }
        } else {
            switch ($request->orderType) {
                case "dealerName":
                    $list = collect($list)->sortBy('dealerName')->values()->all();
                    break;
                case "phoneNumber":
                    $list = collect($list)->sortBy('phoneNumber')->values()->all();
                    break;
            }
        }

        $totalPage = ceil(count($list) / $request->pageSize);
        $list = array_slice($list, ($request->currentPage - 1) * $request->pageSize, $request->pageSize);

        return json_encode(array('totalPage' => $totalPage, 'list' => $list));
    }

    public function create(){
        return view('admin.dealer.add',[
            'title'=>'Thêm đại lý'
        ]);
    }

    
}
