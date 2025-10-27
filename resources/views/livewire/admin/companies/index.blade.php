<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="1xl" class="font-semibold">Dashboard</flux:heading>
        <flux:heading size="lg" class="mb-6">
            List of Companies
        </flux:heading>
        <flux:separator />

        <div class="overflow-x-auto overflow-y-auto bg-white rounded-md shadow-sm w-full flex-1">
            <table class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nome
                        </th>
                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email</th>
                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Number of employees</th>
                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($companies as $company)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700 text-center">{{ $company->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700 text-center">{{ $company->email }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700 text-center">
                                {{ $company->departments->flatMap->designations->flatMap->employees->count() }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700 text-center">
                                <div class="inline-block">
                                    <flux:button variant="filled" icon="pencil"
                                        :href="route('companies.edit', $company->id)" />
                                </div>
                                <div class="inline-block">
                                    <flux:button variant="danger" icon="trash"
                                        wire:click="delete({{ $company->id }})" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">
                                Nenhuma empresa encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
