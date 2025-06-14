<x-form-section submit="updatePassword">
    <x-slot name="title">
        Password
    </x-slot>

    <x-slot name="actionnotification">
        <x-action-message on="saved" class="">
            Saved!
        </x-action-message>
    </x-slot>

    <x-slot name="form">
        <div class="row mt-3">
            <x-label for="current_password" value="Current Password" />
            <x-input id="current_password" type="password" wire:model="state.current_password" autocomplete="current-password" required />
            <x-input-error for="current_password"/>
        </div>
        <div class="row mt-3">
            <x-label for="password" value="New Password" />
            <x-input id="password" type="password" wire:model="state.password" autocomplete="new-password" required />
            <x-input-error for="password"/>
        </div>
        <div class="row mt-3">
            <x-label for="password_confirmation" value="Enter New Password Again" />
            <x-input id="password_confirmation" type="password" wire:model="state.password_confirmation" autocomplete="new-password" required />
            <x-input-error for="password_confirmation"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button class="btn btn-primary">
            Change Password
        </x-button>
    </x-slot>
</x-form-section>
