<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Departments</flux:heading>
        <flux:heading size="lg" class="mb-6"> Create a new department </flux:heading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input label="Department name" wire:model.live="department.name" :invalid="$errors->has('department.name')"
            type="text" />
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>
