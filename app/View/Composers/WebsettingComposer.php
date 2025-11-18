<?php

namespace App\View\Composers;

use App\Models\Websetting;
use Illuminate\View\View;

class WebsettingComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $websetting = Websetting::first();
        $view->with('webset', $websetting);
    }
}

