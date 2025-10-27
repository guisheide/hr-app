<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Designations</flux:heading>
        <flux:heading size="lg" class="mb-6">List of designations for {{ getCompany()->name }}</flux:heading>
        <flux:separator />
    </div>

    <div class="overflow-x-auto overflow-y-auto bg-white rounded-md shadow-sm w-full flex-1">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Designation Name
                    </th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Department</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Number of employees</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($designations as $designation)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">{{ $designation->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            {{ $designation->department->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            {{ $designation->employees->count() }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            <div class="inline-block">
                                <flux:button variant="filled" icon="pencil"
                                    :href="route('designations.edit', $designation->id)" />
                            </div>
                            <div class="inline-block">
                                <flux:button variant="danger" icon="trash"
                                    wire:click="delete({{ $designation->id }})" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-2 px-2 bg-nos-200">
            {{ $designations->links() }}
        </div>
    </div>
