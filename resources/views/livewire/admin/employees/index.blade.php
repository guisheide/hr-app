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
    <div class="overflow-x-auto overflow-y-auto bg-white rounded-md shadow-sm w-full flex-1">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Employee Name
                    </th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Employee email
                    </th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Designation</th>
                    <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($employees as $ket => $employee)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            {{ $employee->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            {{ $employee->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            <div class="text-lg"> {{ $employee->designation->name }}</div>
                            {{ $employee->designation->department->name }}
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-700 text-center">
                            <div class="inline-block">
                                <flux:button variant="filled" icon="pencil"
                                    :href="route('employees.edit', $employee->id)" />
                            </div>
                            <div class="inline-block">
                                <flux:button variant="danger" icon="trash" wire:click="delete({{ $employee->id }})" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-2 px-2 bg-nos-200">
            {{ $employees->links() }}
        </div>
    </div>
