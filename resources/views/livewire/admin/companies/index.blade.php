<div x-data="{ showConfirm: false, deleteId: null }">
<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Companies</flux:heading>
        <flux:heading size="lg" class="mb-6"> List of Companies </flux:heading>
        <flux:separator />
        <x-data-table.frame>
        <x-slot:head>
            <x-data-table.th>Nome</x-data-table.th>
            <x-data-table.th>Email</x-data-table.th>
            <x-data-table.th>Number of employees</x-data-table.th>
            <x-data-table.th>Actions</x-data-table.th>
        </x-slot:head>
        @foreach($companies as $company)
<tr wire:key="company-{{ $company->id }}" x-data="{ visible: true }" x-show="visible" x-transition.opacity.duration.300ms
    @company-deleted.window="if ($event.detail == {{ $company->id }}) visible = false">
    <x-data-table.td>{{ $company->name }}</x-data-table.td>
    <x-data-table.td>{{ $company->email }}</x-data-table.td>
    <x-data-table.td>
        {{ $company->departments->flatMap->designations->flatMap->employees->count() }}
    </x-data-table.td>
    <x-data-table.td>
        <div class="inline-block">
            <flux:button variant="filled" icon="pencil"
                :href="route('companies.edit', $company->id)" />
        </div>
        <div class="inline-block">
            <flux:button 
                 @click="showConfirm = true; deleteId = {{ $company->id }}"
                variant="danger" 
                icon="trash"
                wire:loading.attr="disabled"
                wire:target="delete({{ $company->id }})"
            />
        </div>
    </x-data-table.td>
</tr>
@endforeach
    </x-data-table.frame>
        <div class="mt-4"> {{ $companies->links() }} </div>
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