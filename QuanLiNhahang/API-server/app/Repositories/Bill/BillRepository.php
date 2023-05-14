<?php

namespace App\Repositories\Bill;

use App\Models\Bill;
use App\Repositories\Bill\BillRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class BillRepository extends BaseRepository implements BillRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Bill();
    }

    public function GetBill($id){

        $data = $this-> model -> join('tablefood','tablefood.id_bill','=','bill.id')
        ->join('billinfo', 'billinfo.id_bill', '=', 'bill.id')->where('tablefood.id',"=",$id)
        ->select('bill.*','bill.status as billstatus')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }

    public function checkExist($id){
        $data = $this-> model -> where('id','=',$id) -> count();
        if($data > 0)
        {
            return true;
        }
        return false;
    }
    public function GetBillEryday(){
            $data = $this -> model
            ->select(DB::raw('Sum(sum) as sum,Date(timein) as timein'))
            ->groupBy(DB::raw('Date(timein)')) ->get();
            $total = count($data);
             return ['total' => $total, 'data' => $data];
    }
    public function GetBillOut()
    {
        $data = $this -> model -> where('status','=','Mang Về')-> get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }

}
