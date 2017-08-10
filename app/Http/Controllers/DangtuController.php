<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoodProduct;
use Validator;

class DangtuController extends Controller
{
    public function Add (Request $request) {
    
        $v = Validator::make($request->all(),[
            'txtMonhoc' => 'required|unique:goodproduct,monhoc',
            'txtGiatien' => 'required',
            'txtGiangvien' => 'required',
            'Images'    => 'required|image|max:140'
        ],
        [
            'txtMonhoc.required' => 'Vui long nhap ten mon hoc',
            'txtGiatien.required' => 'Vui long nhap gia tien',
            'txtGiangvien.required' => 'Vui long nhap giang vien',
            'txtMonhoc.unique' => 'Ten mon hoc da ton tai'
        ]);
        if($v->fails()) {
             return redirect()->back()->withErrors($v->errors());
        }

        $img_name = $request->file('Images')->getClientOriginalName();

        $goodProduct = new GoodProduct;
        $goodProduct->monhoc = $request->txtMonhoc;
        $goodProduct->giatien = $request->txtGiatien;
        $goodProduct->giangvien = $request->txtGiangvien;
        $goodProduct->images =  $img_name;

        $des = 'F:\xampp\htdocs\cms\public\upload\images';
        $request->file('Images')->move($des, $img_name);

        $goodProduct->save();
        return redirect('/fom'); // sau khi gui thi xoa het du lieu co trong form
        /*
        echo "<pre>";
         print_r($request->file('Images')->getSize());
         print_r($request->file('Images')->getRealPath());
        print_r($request->file('Images')->getMimeType());
         lay loai hinh
         print_r( $request->file('Images')->getClientOriginalName());
        echo "</pre>";
        getSize -> lay kich co file
        getClientOriginalName -> lay ten hinh
        getRealPath
        */
        
    }

}
