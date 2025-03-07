<?php

/**
 * ----------------------------------------------------------
 * Boshqaruv paneli (Dashboard) nazoratchisi
 * ----------------------------------------------------------
 * 
 * Ushbu nazoratchi boshqaruv paneli sahifasi va unga bog‘liq 
 * funksiyalarni boshqarish uchun javobgardir.
 * 
 */

namespace App\Controllers\Base;
use App\Controllers\Controller;

use App\Models\Form;
use App\Models\Collection;
use App\Models\Space;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $this->stats = $this->homeStats();
        $this->statsChart = Collection::formStats(auth()->id());
        $this->recentSubmissions = Collection::recentSubmissions(auth()->id());

        return $this->renderPage("Boshqaruv paneli", "app.dashboard.home");
    }

    # bosh sahifa statistikasi
    protected function homeStats() : array
    {
        return [
            [   
                'title' => 'Formalari',
                'subtitle' => 'Barcha formalari',
                'count' => Form::userForms(auth()->id())->count(),
                'icon' => 'fa-regular fa-table-tree text-success'
            ],

            # ochiq formalari
            [
                'title' => 'Ochiq',
                'subtitle' => 'Topshirish uchun ochiq',
                'count' => Form::openForms(auth()->id())->count(),
                'icon' => 'fa-regular fa-seal-question text-warning'
            ],

            # bo‘limlar
            [
                'title' => 'Bo‘limlar',
                'subtitle' => 'Barcha bo‘limlar',
                'count' => Space::userSpaces(auth()->id())->count(),
                'icon' => 'fa-regular fa-folders text-info'
            ],

            # ko‘rib chiqilmagan
            [
                'title' => 'Kutilmoqda',
                'subtitle' => 'Ko‘rib chiqilmagan topshiriqlar',
                'count' => Collection::ofReview('pending', auth()->id())->count(),
                'icon' => 'fa-regular fa-seal-exclamation text-danger'
            ]
        ];
    }

    public static function routes() : void
    {
        app()::get('dashboard', ['name'=>'dashboard', 'DashboardController@index']);
    }
}
