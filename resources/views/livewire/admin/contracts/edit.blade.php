<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Contracts</flux:heading>
        <flux:heading size="lg" class="mb-6"> Edit this contract</flux:heading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 max-w-4xl space-y-6">
        <flux:input type="search" name="search" wire:model.live="search" placeholder="Search for an Employee" />
        @if ($search != '' && $employees->count() > 0)
        <div class="border border-gray-300 rounded-md max-h-60 overflow-y-auto shadow-sm">
            <ul class=" divide-y divide-gray-200">
                @foreach ($employees as $employee)
                <li class="px-4 py-3 hover:bg-gray-50 cursor-pointer transition-colors duration-150 text-gray-900 dark:text-gray-100 dark:hover:text-zinc-50" 
                 wire:click="selectEmployee({{ $employee->id }})">
                    {{ $employee->name }}
                @endforeach
            </ul>
        </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <flux:select name="department" label="Department" wire:model.live="department_id">
                <option selected> Select Department </option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"> {{ $department->name }} </option>
                @endforeach
                </flux:select>
            </div>
            <div>
                <flux:select name="designation" label="Designation" wire:model.live="contract.designation_id">
                <option selected> Select Designation </option>
                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}"> {{ $designation->name }} </option>
                @endforeach
                </flux:select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <flux:input type="date" name="start_date" label="Start Date" wire:model.live="contract.start_date" />
            </div>
            <div>
                <flux:input type="date" name="end_date" label="End Date" wire:model.live="contract.end_date" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
             <div>
                <flux:input type="number" name="rate" label="Rate" wire:model.live="contract.rate" />
            </div>
            <div>
                <flux:select name="rate_type" label="Rate Type" wire:model.live="contract.rate_type">
                    <option selected> Select Rate Type </option>
                    <option value="daily"> Daily </option>
                    <option value="monthly"> Monthly </option>
                </flux:select>
            </div>
        </div>
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>
