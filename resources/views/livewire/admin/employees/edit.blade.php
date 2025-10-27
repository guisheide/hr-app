<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Employees</flux:heading>
        <flux:heading size="lg" class="mb-6"> Edit a new employee </flux:heading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <div class = "grid grid-cols-1 md:grid-cols-2 gap-6">
            <flux:select label="Select Department" wire:model.live="department_id"
                :invalid="$errors->has('department_id')">
                <option selected disabled>Select a department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </flux:select>
            <flux:select label="Select Designation" wire:model.live="employee.designation_id"
                :invalid="$errors->has('employee.designation')">
                <option selected disabled>Select a designation</option>
                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                @endforeach
            </flux:select>
        </div>
        <flux:input label="Employee name" wire:model.live="employee.name" :invalid="$errors->has('employee.name')"
            type="text" />
        <flux:input label="Employee email" wire:model.live="employee.email" :invalid="$errors->has('employee.email')"
            type="text" />
        <flux:input label="Phone number" wire:model.live="employee.phone" :invalid="$errors->has('employee.phone')"
            type="text" />
        <flux:input label="Address" wire:model.live="employee.address" :invalid="$errors->has('employee.address')"
            type="text" />
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>
