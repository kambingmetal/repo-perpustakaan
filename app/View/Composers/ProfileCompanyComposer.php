<?php

namespace App\View\Composers;

use App\Models\ProfileCompany;
use Illuminate\View\View;

class ProfileCompanyComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('globalProfile', ProfileCompany::getInstance());
        $view->with('globalSettingPage', \App\Models\SettingPage::getInstance());
        $view->with('settingPage', \App\Models\SettingPage::getInstance(request()->route()?->getName()));
    }
}