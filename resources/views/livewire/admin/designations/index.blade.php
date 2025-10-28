<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Designations</flux:heading>
        <flux:heading size="lg" class="mb-6">List of designations for {{ getCompany()->name }}</flux:heading>
        <flux:separator />
    </div>

    <x-data-table.frame>

        <x-slot:head>
            <x-data-table.th>Designation Name</x-data-table.th>
            <x-data-table.th>Department</x-data-table.th>
            <x-data-table.th>Number of employees</x-data-table.th>
            <x-data-table.th>Actions</x-data-table.th>
        </x-slot:head>

        @forelse ($designations as $designation)
            <tr wire:key="designation-{{ $designation->id }}">
                <x-data-table.td>{{ $designation->name }}</x-data-table.td>
                <x-data-table.td>{{ $designation->department->name }}</x-data-table.td>
                <x-data-table.td>{{ $designation->employees->count() }}</x-data-table.td>
                <x-data-table.td>
                    <div class="inline-block">
                        <flux:button variant="filled" icon="pencil"
                            :href="route('designations.edit', $designation->id)" />
                    </div>
                    <div class="inline-block">
                        <flux:button variant="danger" icon="trash"
                            wire:click="delete({{ $designation->id }})" />
                    </div>
                </x-data-table.td>
            </tr>
        @empty
            <tr>
                <x-data-table.td colspan="4" class="px-6 py-8 text-sm text-gray-500">
                    Nenhuma designação encontrada.
                </x-data-table.td>
            </tr>
        @endforelse

    </x-data-table.frame>

    <div class="mt-4">
        {{ $designations->links() }}
    </div>
</div>