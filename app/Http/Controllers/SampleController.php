<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function showPage()
    {
        $fruit_list = [
            [
                "name" => "apple",
                "price" => 300
            ],
            [
                "name" => "banana",
                "price" => 300
            ],
            [
                "name" => "peach",
                "price" => 500
            ],
            [
                "name" => "lemon",
                "price" => 200
            ],
        ];

        $name_list = [
            [
                "name_job" => "工藤"
            ],
            [
                "name_job" => "内藤"
            ],
        ];

        $total = 0;
        foreach($fruit_list as $fruit) {
            $total += $fruit["price"];
        }

        return view('sample', [
            "fruit_list" => $fruit_list,
            "name_list" =>$name_list,
            "total" => $total
        ]);
    }
}
