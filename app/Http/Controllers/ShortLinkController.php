<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeshort_linkRequest;
use App\Http\Requests\Updateshort_linkRequest;
use App\Models\short_link;
use App\Models\Url;

class ShortLinkController extends Controller
{
    public function redirect($shortUrl)
    {
        $url = Url::where('short_code', $shortUrl)->firstOrFail();

        return redirect($url->original_url);
    }
}
