<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking') }}
        </h2>
    </x-slot>
    <x-slot name="script">
        <script>
            var datatable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: '{!! url()->current() !!}'

                },
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json',
                },
                columns: [{
                        data: 'id',
                        name: 'id',

                    },
                    {
                        data:'name',
                        name:'name'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name',
                    },
                    {
                        data: 'item.brand.name',
                        name: 'item.brand.name',
                    },
                    {
                        data: 'item.name',
                        name: 'item.name',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                    },
                    {

                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%',
                    },

                ]
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>User</th>
                                <th>Brand</th>
                                <th>Item</th>
                                <th>Status Booking</th>
                                <th>Status Pembayaran</th>
                                <th>Total Dibayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
