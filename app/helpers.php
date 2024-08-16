<?php

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Products;


if (!function_exists('formatCreatedAt')) {
    function formatCreatedAt($createdAt){
        return Carbon::parse($createdAt)->format('Y-m-d H:i:s');
    }
}

?>