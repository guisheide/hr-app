<div>
   <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Employees</flux:heading>
        <flux:heading size="lg" class="mb-6">List of employees for {{ getCompany()->name }}</flux:heading>
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
                                <flux:button variant="danger" icon="trash" wire:click="delete({{ $contract->id }})" />
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
</div>
