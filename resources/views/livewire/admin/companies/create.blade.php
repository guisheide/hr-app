<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Companies</flux:heading>
        <flux:heading size="lg" class="mb-6"> Create a new companie </flux:heading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input label="Company Name" wire:model.live="company.name" :invalid="$errors->has('company.name')"
            type="text" />
        <flux:input label="Company Email Address" wire:model.live="company.email"
            :invalid="$errors->has('company.email')" type="text" />
        <flux:input label="Company website" wire:model.live="company.website" :invalid="$errors->has('company.website')"
            type="text" />
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>
