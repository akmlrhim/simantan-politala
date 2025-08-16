<?php

namespace App\Providers;

use App\Models\Disposisi;
use App\Models\DisposisiPenerima;
use App\Models\Jabatan;
use App\Models\JenisSurat;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\TelahanStaf;
use App\Models\User;
use App\Observers\ActivityObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        SuratMasuk::observe(ActivityObserver::class);
        Disposisi::observe(ActivityObserver::class);
        JenisSurat::observe(ActivityObserver::class);
        Jabatan::observe(ActivityObserver::class);
        TelahanStaf::observe(ActivityObserver::class);
        SuratKeluar::observe(ActivityObserver::class);
        DisposisiPenerima::observe(ActivityObserver::class);
        User::observe(ActivityObserver::class);
    }
}
