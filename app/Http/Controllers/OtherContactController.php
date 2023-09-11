<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOtherContactRequest;
use App\Interfaces\Services\IOtherContactService;
use App\Models\dealer;
use App\Models\otherContact;
use Illuminate\Http\Request;

class OtherContactController extends Controller
{
    public function __construct(private IOtherContactService $otherContactService){
    }

    public function index(){
        return view('admin.otherContact.list',[
            'title'=>'Danh sách các liên lạc khác',
            'dealers'=> dealer::get()
        ]);
    }

    public function getList(Request $request){
        $list = array();
        if(!empty($request->searchValue)){
            switch ($request->typeSearch){
                case "phoneNumber":
                    $list = $this->otherContactService->getAll()->where('phoneNumber','like','%'.$request->searchValue.'%')->where('IDDealer',$request->IDDealer)->get();
                    break;
                case "fullName":
                    $list = $this->otherContactService->getAll()->where('fullName','like','%'.$request->searchValue.'%')->where('IDDealer',$request->IDDealer)->get();
            }
        } else {
            $list = $this->otherContactService->getAll()->where('IDDealer',$request->IDDealer)->get();
        }
        // dd($request->IDDealer,$list);
        if ($request->orderBy == "desc") {
            switch ($request->orderType) {
                case "phoneNumber":
                    $list = collect($list)->sortByDesc('phoneNumber')->values()->all();
                    break;
                case "fullName":
                    $list = collect($list)->sortByDesc('fullName')->values()->all();
                    break;
            }
        } else {
            switch ($request->orderType) {
                case "phoneNumber":
                    $list = collect($list)->sortBy('phoneNumber')->values()->all();
                    break;
                case "fullName":
                    $list = collect($list)->sortBy('fullName')->values()->all();
                    break;
            }
        }

        $totalPage = ceil(count($list) / $request->pageSize);
        $list = array_slice($list, ($request->currentPage - 1) * $request->pageSize, $request->pageSize);

        return json_encode(array('totalPage' => $totalPage, 'list' => $list));
    }

    public function create(){
        return view('admin.otherContact.add',[
            'title'=>'Thêm Liên hệ khác',
            'dealers'=> dealer::get()
        ]);
    }

    public function store(CreateOtherContactRequest $request){
        $result = $this->otherContactService->create($request);
        return redirect()->back();
    }

    public function edit(otherContact $otherContact){
        return view('admin.otherContact.edit',[
            'title'=>'Sửa thông tin liên hệ khác',
            'dealers'=> dealer::get(),
            'otherContact'=>$otherContact,
        ]);
    }

    public function postedit(otherContact $otherContact,CreateOtherContactRequest $request){
        $result = $this->otherContactService->edit($request,$otherContact);
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->otherContactService->delete($request);
        if($result) {
            return response()->json([
                'error'=>'false',
                'message'=>'xóa thành công'
            ]);
        }

        return response()->json([
            'error'=>'true'
        ]);
    }
}
