<div x-data="{ showConfirm: false, deleteId: null }">
   <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Contracts</flux:heading>
        <flux:heading size="lg" class="mb-6">List of contracts for {{ getCompany()->name }}</flux:heading>
        <flux:separator />
    </div>

   <div class="overflow-x-auto overflow-y-auto bg-white rounded-md shadow-sm w-full flex-1">
        <table class="w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Employee Details
                    </th>
                    <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Contract Details
                    </th>
                    <th class="px-6 py-4  text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Rate</th>
                    <th class="px-4 py-2  text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($contracts as $ket => $contract)
                    <tr wire:key="contract-{{ $contract->id }}">
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            <span class="font-semibild text-lg"> {{ $contract->employee->name }}</span>
                            <span > {{ $contract->employee->email }}</span>
                            <span > {{ $contract->employee->phone }}</span>
                            <span > {{ $contract->employee->designation->name }}</span>
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            <span> {{ $contract->start_date }} </span>
                            <span> {{ $contract->end_date }} </span>
                            <span class="font-semibild text-lg"> {{ $contract->duration }} </span> 
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            $ {{ number_format($contract->rate) }} {{ $contract->rate_type }}
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            <div class="inline-block">
                                <flux:button variant="filled" icon="pencil"
                                    :href="route('contracts.edit', $contract->id)" />
                            </div>
                            <div class="inline-block">
                                <flux:button variant="danger" icon="trash"  @click="showConfirm = true; deleteId = {{ $contract->id }}" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-2 px-2 bg-nos-200">
            {{ $contracts->links() }}
        </div>
    </div>
        <div
        x-show="showConfirm"
        x-cloak
        x-transition.opacity.duration.250ms
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-100 z-50">

        <div @click.away="showConfirm = false"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-90 translate-y-4"
            class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-lg">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm exclusion</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this contract?</p>
            <div class="flex justify-end gap-3">
                <flux:button
                    variant="subtle"
                    @click="showConfirm = false"
                >
                    Cancel
                </flux:button>

                <flux:button
                    variant="danger"
                    @click="$wire.delete(deleteId); showConfirm = false"
                >
                    Delete
                </flux:button>
            </div>
        </div>
    </div>
</div>
