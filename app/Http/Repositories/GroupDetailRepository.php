<?php
namespace App\Http\Repositories;
use App\Models\groupDetailDealer;
use App\Models\dealer;
use Exception;
use App\Interfaces\Repositories\IGroupDetailRepository;
use Illuminate\Support\Facades\DB;
class GroupDetailRepository implements IGroupDetailRepository{
    public function Show(int $id){
        $list = array();
        //     $leagues = DB::table('leagues')
        // ->select('league_name')
        // ->join('countries', 'countries.country_id', '=', 'leagues.country_id')
        // ->where('countries.country_name', $country)
        // ->get();
        // return groupDetailDealer::where('IDGroup',$id)->get();
        return DB::table('dealers')
        ->join('group_detail_dealers','group_detail_dealers.IDDealer','=','dealers.id')
        ->select('dealers.*')
        ->where('group_detail_dealers.IDGroup',$id)
        ->get();
    }
    public function List(){
        return request()->search != null ?
            dealer::where('dealerName','ilike','%'.request()->search.'%')->paginate(10)->withQueryString()

        :
            dealer::paginate(10)->withQueryString();

    }
    public function Add($request){
        // $list = [];
        // foreach($request->input('ids') as $id){
        //     // array_push($list,$request->input('groupID'),$id);
        //     $gd = new groupDetailDealer();
        //     $gd->IDDealer = $id;
        //     $gd->IDGroup = $request->input('groupID');
        //     $list[] = $gd->attributesToArray();
        // }
        // dd($list);
        try {
            $list = [];
            foreach($request->input('ids') as $id){
                // array_push($list,$request->input('groupID'),$id);
                $gd = new groupDetailDealer();
                $gd->IDDealer = $id;
                $gd->IDGroup = $request->input('groupID');
                $list[] = $gd->attributesToArray();
            }
            groupDetailDealer::insert($list);
            Session()->flash('success', 'Thêm thành công');
        } catch (Exception $ex) {
            Session()->flash('error', $ex->getMessage());
            return false;
        }
        return true;
        // groupDetailDealer::insert($list);
    }
    public function Delete($request){
        $dealer = groupDetailDealer::where('IDDealer', $request->input('id'))->first();
        if ($dealer) {
            $dealer->delete();
            return true;
        }
        return false;
    }
}
?>
