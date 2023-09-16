<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\IGroupDealerRepository;
use App\Interfaces\Services\IGroupService;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGroupRequest;
use App\Models\groupDealer;
use App\Models\groupDetailDealer;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Echo_;

use function PHPUnit\Framework\isEmpty;

class GroupDealerController extends Controller
{
    //
    public function __construct(private IGroupService $iGroupService)
    {
    }
    public function index()
    {
        return view('admin.group.list', [
            'title' => 'Danh sách nhóm',
            'group' => $this->iGroupService->List()
        ]);
    }
    public function add()
    {
        return view('admin.group.add', [
            'title' => 'Thêm nhóm mới',
        ]);
    }
    public function store(CreateGroupRequest $request)
    {
        $result = $this->iGroupService->Create($request);
        return redirect()->back();
    }
    public function edit(groupDealer $groupDealer)
    {
        return view('admin.group.edit', [
            'title' => 'Sửa tên nhóm',
            'group' => $groupDealer
        ]);
    }
    public function postedit(CreateGroupRequest $request, groupDealer $groupDealer)
    {
        $result = $this->iGroupService->EditGroup($request, $groupDealer);
        return redirect('admin/group/list');
    }
    public function delete(Request $request)
    {
        $result = $this->iGroupService->Delete($request);
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
