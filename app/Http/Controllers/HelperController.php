<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    static function ratting($ratting)
    {
        $output = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= round($ratting, 1))
                $output .= '<span class="fa fa-stack" > <i class="fa fa-star fa-stack-2x" ></i ></span >';
            else {
                if (is_float($ratting) && round($ratting, 0) == $i) {
                    $output .= '<span class="fa fa-stack" ><i class="fa fa-star-half-o fa-stack-2x" ></i ></span>';
                }else{
                    $output .= '<span class="fa fa-stack" ><i class="fa fa-star-o fa-stack-2x" ></i ></span>';
                }
            }
        }
        echo $output;
    }

}
