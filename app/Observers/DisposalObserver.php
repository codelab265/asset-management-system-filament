<?php

namespace App\Observers;

use App\Models\Disposal;

class DisposalObserver
{
    /**
     * Handle the Disposal "created" event.
     */
    public function created(Disposal $disposal): void
    {
        $disposal->asset()->update(['disposed' => true]);
    }

    /**
     * Handle the Disposal "updated" event.
     */
    public function updated(Disposal $disposal): void
    {
        //
    }

    /**
     * Handle the Disposal "deleted" event.
     */
    public function deleted(Disposal $disposal): void
    {
        $disposal->asset()->update(['disposed' => false]);
    }


    /**
     * Handle the Disposal "restored" event.
     */
    public function restored(Disposal $disposal): void
    {
        //
    }

    /**
     * Handle the Disposal "force deleted" event.
     */
    public function forceDeleted(Disposal $disposal): void
    {
        //
    }
}
