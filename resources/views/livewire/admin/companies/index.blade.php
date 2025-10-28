<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Dashboard</flux:heading>
        <flux:heading size="lg" class="mb-6">
            List of Companies
        </flux:heading>
        <flux:separator />

        <x-data-table.frame>
        <x-slot:head>
            <x-data-table.th>Nome</x-data-table.th>
            <x-data-table.th>Email</x-data-table.th>
            <x-data-table.th>Number of employees</x-data-table.th>
            <x-data-table.th>Actions</x-data-table.th>
        </x-slot:head>

        @foreach($companies as $company)
<tr wire:key="company-{{ $company->id }}"
    x-data="{ visible: true }"
    x-show="visible"
    x-transition.opacity.duration.300ms
    @company-deleted.window="if ($event.detail == {{ $company->id }}) visible = false"
>
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
                variant="danger" 
                icon="trash"
                wire:click="delete({{ $company->id }})"
                wire:loading.attr="disabled"
                wire:target="delete({{ $company->id }})"
            />
        </div>
    </x-data-table.td>
</tr>
@endforeach
    </x-data-table.frame>

        {{-- Paginação --}}
        <div class="mt-4">
            {{ $companies->links() }}
        </div>
    </div>
