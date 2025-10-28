<div>
    {{-- 1. Cabeçalho da Página (inalterado) --}}
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Departments</flux:heading>
        <flux:heading size="lg" class="mb-6">List of departments for {{ getCompany()->name }}</flux:heading>
        <flux:separator />
    </div>

    {{-- 2. Tabela Componentizada --}}
    <x-data-table.frame>
        
        {{-- 3. Slot de Cabeçalho --}}
        <x-slot:head>
            <x-data-table.th>Department Name</x-data-table.th>
            <x-data-table.th>Number of Designations</x-data-table.th>
            <x-data-table.th>Number of employees</x-data-table.th>
            <x-data-table.th>Actions</x-data-table.th>
        </x-slot:head>

        {{-- 4. Slot Padrão (Corpo) --}}
        @forelse ($departments as $department)
            <tr wire:key="department-{{ $department->id }}">
                <x-data-table.td>{{ $department->name }}</x-data-table.td>
                <x-data-table.td>{{ $department->designations->count() }}</x-data-table.td>
                <x-data-table.td>
                    {{ $department->designations->flatMap->employees->count() }}
                </x-data-table.td>
                <x-data-table.td>
                    <div class="inline-block">
                        <flux:button variant="filled" icon="pencil"
                            :href="route('departments.edit', $department->id)" />
                    </div>
                    <div class="inline-block">
                        <flux:button variant="danger" icon="trash"
                            wire:click="delete({{ $department->id }})" />
                    </div>
                </x-data-table.td>
            </tr>
        @empty
            {{-- 5. Estado de "vazio" (Melhoria) --}}
            <tr>
                <x-data-table.td colspan="4" class="px-6 py-8 text-sm text-gray-500">
                    Nenhum departamento encontrado.
                </x-data-table.td>
            </tr>
        @endforelse

    </x-data-table.frame>

    {{-- 6. Paginação (Fora do frame) --}}
    <div class="mt-4">
        {{ $departments->links() }}
    </div>
</div>