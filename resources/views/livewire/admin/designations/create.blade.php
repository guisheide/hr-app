<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Designations</flux:heading>
        <flux:heading size="lg" class="mb-6"> Create a new designation </flux:heading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:select label="Select Department" wire:model.live="designation.department_id"
            :invalid="$errors->has('designation.department_id')">
            <option selected disabled>Select a department</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </flux:select>
        <flux:input label="Designation name" wire:model.live="designation.name"
            :invalid="$errors->has('designation.name')" type="text" />
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>
