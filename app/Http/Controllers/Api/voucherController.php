<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\voucher;
use Illuminate\Http\Request;

class voucherController extends Controller
{
    public function getUuid($uuid){
        $voucher =  voucher::where('uuid', $uuid)->first();        

        if(empty($voucher)){
            $response = [
                "msg" => "Voucher tidak ditemukan",
                "status" => 0
            ];  
            return response()->json($response, 404);
        }
        else if(strtotime($voucher->expired) < strtotime(date('Y-m-d')) ){
            $response = [
                "msg" => "Voucher expired",
                "status" => 0
            ];  
            return response()->json($response, 404);
        }
        else{
            $response = [
                "msg" => "Voucher ditemukan",
                "vvid" => $voucher->uuid,
                "nama" => $voucher->nama,
                "expired" => $voucher->expired,
            ];
            return response()->json($response, 201);
        }
    }  
}
