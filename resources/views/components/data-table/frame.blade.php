<div class="overflow-x-auto overflow-y-auto bg-white rounded-md shadow-sm w-full flex-1">
    <table {{ $attributes->merge(['class' => 'w-full divide-y divide-gray-200 table-auto']) }}>
        
        @isset($head)
            <thead class="bg-gray-50">
                <tr>
                    {{ $head }}
                </tr>
            </thead>
        @endisset

        <tbody class="bg-white divide-y divide-gray-200">
            {{ $slot }}
        </tbody>

        @isset($foot)
            <tfoot class="bg-gray-50">
                <tr>
                    {{ $foot }}
                </tr>
            </tfoot>
        @endisset
    </table>
</div>