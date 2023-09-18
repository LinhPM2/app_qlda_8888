<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDealerRequest;
use App\Interfaces\Repositories\IAnniversaryDealerRepository;
use App\Interfaces\Repositories\IOtherContactRepository;
use App\Interfaces\Services\IAnniversaryDealerService;
use App\Interfaces\Services\IDealerService;
use App\Interfaces\Services\IOtherContactService;
use App\Models\dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function __construct(
            private IDealerService $dealerService,
            private IOtherContactRepository $otherContactRepo,
            private IAnniversaryDealerRepository $anniversaryRepo,
        ){
    }
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
                    $list = $this->dealerService->getAll()->where('dealerName','like','%'.$request->searchValue.'%')->get();
                    break;
                case "phoneNumber":
                    $list = $this->dealerService->getAll()->where('phoneNumber','like','%'.$request->searchValue.'%')->get();
            }
        } else {
            $list = $this->dealerService->getAll()->get();
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

    public function store(CreateDealerRequest $request){
        $result = $this->dealerService->create($request);
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->dealerService->delete($request);
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

    public function edit(dealer $dealer){
        return view('admin.dealer.edit',[
            'title'=>'Sửa thông tin đại lý',
            'dealer'=>$dealer,
            'otherContacts' => $this->otherContactRepo->getAll()->where('IDDealer',$dealer->id)->get(),
            'anniversaries' => $this->anniversaryRepo->getAll()->where('IDDealer',$dealer->id)->get(),
        ]);
    }

    public function postedit(dealer $dealer,CreateDealerRequest $request){
        $result = $this->dealerService->edit($request,$dealer);
        return redirect()->back();
    }
}
