<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnniversaryDealerRequest;
use App\Interfaces\Repositories\IDealerRepository;
use App\Interfaces\Services\IAnniversaryDealerService;
use App\Models\anniversaryDealer;
use App\Models\dealer;
use Illuminate\Http\Request;

class AnniversaryDealerController extends Controller
{
    public function __construct(private IAnniversaryDealerService $anniversaryService,private IDealerRepository $dealerRepo){
    }
    public function create(dealer $dealer){
        return view('admin.anniversary.add',[
            'title'=>'Thêm Ngày kỉ niệm',
            'dealer'=> $dealer
        ]);
    }

    public function store(CreateAnniversaryDealerRequest $request){
        $result = $this->anniversaryService->create($request);
        $dealer = $this->dealerRepo->getAll()->where('id',$request->IDDealer)->first();
        return redirect('/admin/dealer/edit/'.$dealer->id);
    }

    public function edit(anniversaryDealer $anniversary){
        return view('admin.anniversary.edit',[
            'title'=>'Sửa thông tin liên hệ khác',
            'dealer'=> $this->dealerRepo->getAll()->where('id',$anniversary->IDDealer)->first(),
            'anniversary'=>$anniversary,
        ]);
    }

    public function postedit(anniversaryDealer $anniversary,CreateAnniversaryDealerRequest $request){
        $result = $this->anniversaryService->edit($request,$anniversary);
        $dealer = $this->dealerRepo->getAll()->where('id',$anniversary->IDDealer)->first();
        return redirect('/admin/dealer/edit/'.$dealer->id);
    }

    public function delete(Request $request){
        $result = $this->anniversaryService->delete($request);
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
