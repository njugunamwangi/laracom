<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $recipients = User::role(Role::IS_ADMIN)->get();

        foreach ($recipients as $recipient) {
            Notification::make()
                ->title('New user registration')
                ->warning()
                ->icon('heroicon-o-user-plus')
                ->body($user->name.' created an account')
                ->actions([
                    Action::make('markAsRead')
                        ->button()
                        ->markAsRead(),
                ])
                ->sendToDatabase($recipient);
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
