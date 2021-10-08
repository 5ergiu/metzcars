<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LocaleService
{
    public const LOCALE_EN = 'en';
    public const LOCALE_RO = 'ro';

    public static array $locales = [
        self::LOCALE_EN => 'English',
        self::LOCALE_RO => 'Română',
    ];

    /**
     * @return void
     */
    public static function setLocale(): void
    {
        App::setLocale(Cookie::get('locale') ?? self::LOCALE_RO);
    }
}
