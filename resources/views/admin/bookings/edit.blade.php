<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="" onclick="window.history.go(-1); return false;">
                &#8678; </a>
            {!! __('Booking &raquo; Sunting &raquo; #') . $booking->id . '&middot;' . $booking->name !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
                            Ada kesalahan!
                        </div>
                        <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif
                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="post" class="w-full"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--Nama-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Nama</label>
                            <input type="text" name="name" value="{{ old('name') ?? $booking->name }}"
                                id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Name">
                            <div class="mt-2 text-sm text-gray-500">
                                Nama Booking. Contoh : Booking 1, Booking 2, Booking 3, dsb. Wajib diisi. Maksimal 255
                                karakter.
                            </div>
                        </div>
                    </div>

                    <!--Alamat-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Alamat</label>
                            <input type="text" name="address" value="{{ old('address') ?? $booking->address }}"
                                id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Alamat">
                            <div class="mt-2 text-sm text-gray-500">
                                Nama Alamat. Contoh : Jl.Gareng dsb. Wajib diisir.
                            </div>
                        </div>
                    </div>

                    <!--kota-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Kota</label>
                            <input type="text" name="city" value="{{ old('city') ?? $booking->city }}"
                                id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Name">
                            <div class="mt-2 text-sm text-gray-500">
                                Nama kota. Contoh : Jogja dsb. Wajib diisi.
                            </div>
                        </div>
                    </div>

                    <!--zip-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Code
                                Pos</label>
                            <input type="number" name="zip" value="{{ old('zip') ?? $booking->zip }}"
                                id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Code">
                            <div class="mt-2 text-sm text-gray-500">
                                Code Pos. Contoh : 93123 , dsb. Wajib diisi.
                            </div>
                        </div>
                    </div>

                    <!--Status-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Status
                                Booking</label>

                            <select name="status" id=""
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>
                                    Confirmed</option>
                                <option value="done" {{ $booking->status == 'done' ? 'selected' : '' }}>Done</option>

                            </select>
                            <div class="mt-2 text-sm text-gray-500">
                                Status Booking contoh:pending.
                            </div>
                        </div>
                    </div>

                    <!--Status Pembayaran-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Status
                                Pembayaran</label>

                            <select name="status" id=""
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="pending" {{ $booking->payment_status == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="success" {{ $booking->payment_status == 'success' ? 'selected' : '' }}>
                                    Success</option>
                                <option value="failed" {{ $booking->payment_status == 'failed' ? 'selected' : '' }}>
                                    Failed
                                </option>
                                <option value="expired" {{ $booking->payment_status == 'expired' ? 'selected' : '' }}>
                                    Expaired
                                </option>   
                            </select>
                            <div class="mt-2 text-sm text-gray-500">
                                Status Booking contoh:pending.
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap mb-6 mx-3">
                        <div class="w-full px-3 text-right">
                            <button type="submit"
                                class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                                Simpan Item
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
