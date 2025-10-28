<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Employees</flux:heading>
        <flux:heading size="lg" class="mb-6">List of employees for {{ getCompany()->name }}</flux:heading>
        <flux:separator />
    </div>

    <div class="mb-4">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar por Nome ou E-mail..."
            class="w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <x-data-table.frame>

        <x-slot:head>
            <x-data-table.th>Employee Name</x-data-table.th>
            <x-data-table.th>Employee email</x-data-table.th>
            <x-data-table.th>Designation</x-data-table.th>
            <x-data-table.th>Actions</x-data-table.th>
        </x-slot:head>

    @forelse ($employees as $employee)
        <tr wire:key="employee-{{ $employee->id }}">
            <x-data-table.td>{{ $employee->name }}</x-data-table.td>
            <x-data-table.td>{{ $employee->email }}</x-data-table.td>
            
            <x-data-table.td>
                <div class="text-lg"> {{ $employee->designation->name }}</div>
                {{ $employee->designation->department->name }}
            </x-data-table.td>
            
            <x-data-table.td>
                <div class="inline-block">
                    <flux:button variant="filled" icon="pencil"
                        :href="route('employees.edit', $employee->id)" />
                </div>
                <div class="inline-block">
                    <flux:button variant="danger" icon="trash" wire:click="delete({{ $employee->id }})" />
                </div>
            </x-data-table.td>
        </tr>
    @empty
        <tr>
            <x-data-table.td colspan="4" class="px-6 py-8 text-sm text-gray-500">
                Nenhum funcionário encontrado.
            </x-data-table.td>
        </tr>
    @endforelse

    </x-data-table.frame>

    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</div>