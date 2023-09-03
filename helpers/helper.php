<?php

use App\Models\DiscountCode;
use App\Models\Notification;
use App\Models\RealEstate;
use App\Models\RealEstatePrices;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
define('EUR', 978);
define('USD', 840);
define('JOD', 400);

define('PER_PAGE', 3);





function getTranslationsJs()
{
    $translationFile = resource_path('lang/' . app()->getLocale() . '.json');

    if (!is_readable($translationFile)) {
        $translationFile = resource_path('lang/' . app('translator')->getFallback() . '.json');
    }

    return ['translations' => json_decode(file_get_contents($translationFile), true)];
}

function user() {
    return auth()->guard('web')->user();
}






function prepareResult($status, $data, $msg, $code)
{
    return response(['status' => $status, 'data' => $data, 'message' => $msg], $code);
}
