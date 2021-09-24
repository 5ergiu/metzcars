<?php

namespace App\Http\Controllers;

use App\Services\LocaleService;
use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{

    /**
     * @param string $code
     * @return RedirectResponse
     */
    public function handleLocaleChange(string $code): RedirectResponse
    {
        if (!in_array($code, array_keys(LocaleService::$locales))) {
            $code = LocaleService::LOCALE_EN;
        }

        return redirect()->back()->withCookie(cookie()->forever('locale', $code));
    }
}
