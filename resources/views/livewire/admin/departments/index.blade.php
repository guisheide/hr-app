<div x-data="{ showConfirm: false, deleteId: null }">
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
                        <flux:button variant="danger" icon="trash" @click="showConfirm = true; deleteId = {{ $department->id }}"/>
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
    <div x-show="showConfirm" x-cloak x-transition.opacity.duration.250ms class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-100 z-50">
        <div @click.away="showConfirm = false"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-90 translate-y-4"
            class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-lg">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm exclusion</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this designation?</p>
            <div class="flex justify-end gap-3">
                <flux:button variant="subtle" @click="showConfirm = false"> Cancel </flux:button>
                <flux:button variant="danger" @click="$wire.delete(deleteId); showConfirm = false"> Delete </flux:button>
            </div>
        </div>
    </div>
</div>