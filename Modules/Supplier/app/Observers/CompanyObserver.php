<?php

namespace Modules\supplier\Observers;

use Modules\supplier\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyObserver
{

    /**
     * Handle the Company "creating" event.
     */
    public function creating(Company $company): void
    {
        if (Auth::check()) {
            $company->creator_id = Auth::id();
            $company->creator_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void {}

    /**
     * Handle the Company "updating" event.
     */
    public function updating(Company $company): void
    {
        if (Auth::check()) {
            $company->editor_id = Auth::id();
            $company->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Company "updated" event.
     */
    public function updated(Company $company): void {}

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void {}

    /**
     * Handle the Company "restored" event.
     */
    public function restored(Company $company): void {}

    /**
     * Handle the Company "force deleted" event.
     */
    public function forceDeleted(Company $company): void {}
}
