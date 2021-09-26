<?php

namespace App\Http\Controllers;

use App\Services\AutovitService;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __construct(
        private AutovitService $autovitService
    ) { }

    /**
     * @return View
     */
    public function index(): View
    {
        $this->autovitService->getCategories();
        return view('portfolio.portfolio');
    }
}
