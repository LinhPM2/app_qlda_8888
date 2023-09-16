<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\IGroupDetailService;
use App\Models\groupDealer;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;

class GroupDetailDealerController extends Controller
{
    //
    public function __construct(private IGroupDetailService $iGroupDetailService)
    {
    }
    public function detail(groupDealer $groupDealer){
        return view('admin.groupdetail.detail', [
            'title' => $groupDealer->groupName,
            'groupDetails' => $this->iGroupDetailService->Show($groupDealer->id),
            'id' => $groupDealer->id
        ]);
    }
    public function add(){
            return view('admin.groupdetail.add', [
                'title' => 'Thêm thành viên',
                'dealer'=> $this->iGroupDetailService->List(),
                'groupid' => request()->groupID
            ]);
    }
    public function store(Request $request,groupDealer $groupDealer){
        $result = $this->iGroupDetailService->Add($request,$groupDealer);
        return redirect()->back();
    }
    public function delete(Request $request){
        $result = $this->iGroupDetailService->Delete($request);
        if ($result) {
            return response()->json([
                'error' => 'false',
                'message' => 'xóa thành công'
            ]);
        }
        return response()->json([
            'error' => 'true'
        ]);
    }
}
