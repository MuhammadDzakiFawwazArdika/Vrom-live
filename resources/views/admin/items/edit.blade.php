<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="" onclick="window.history.go(-1); return false;">
                &#8678; </a>
            {!! __('Item &raquo; Sunting &raquo; #') . $item->id . '&middot;' . $item->name !!}
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
                <form action="{{ route('admin.items.update', $item->id) }}" method="post" class="w-full"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--Nama-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Nama</label>
                            <input type="text" name="name" value="{{ old('name') ?? $item->name }}"
                                id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Name">
                            <div class="mt-2 text-sm text-gray-500">
                                Nama Item. Contoh : Item 1, Item 2, Item 3, dsb. Wajib diisi. Maksimal 255
                                karakter.
                            </div>
                        </div>
                    </div>

                    <!--Brand-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Brand</label>
                            <select name="brand_id" id=""
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                required>
                                <option value="{{ $item->brand->id }}">Tidak diubah ({{ $item->brand->name }})</option>
                                <option disabled>--------</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="mt-2 text-sm text-gray-500">
                                Brand Item. Contoh : Porsche. Wajib diisi.
                            </div>
                        </div>
                    </div>

                    <!--Type-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Type</label>
                            <select name="type_id" id=""
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                required>
                                <option value="{{ $item->type->id }}">Tidak diubah ({{ $item->type->name }})</option>
                                <option disabled>--------</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="mt-2 text-sm text-gray-500">
                                Type Item. Contoh : Electric Cer. Wajib diisi.
                            </div>
                        </div>
                    </div>

                    <!--Fitur-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Fitured</label>
                            <input type="text" name="features" value="{{ old('features') ?? $item->features }}"
                                id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Features">
                            <div class="mt-2 text-sm text-gray-500">
                                Nama Features. Contoh : Features 1, Features 2, Features 3, dsb. Maksimal 255
                                karakter Dipisahkan Dengan koma (,).
                            </div>
                        </div>
                    </div>

                    <!--Photos-->
                    <div class="flex flex-wrap px-3 mt-4 mb-6 mx-3">
                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Photo</label>
                            <input type="file" name="photos[]" value="{{ old('photos') ?? $item->photos }}"
                                id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                accept="image/png, image/jpg, image/jpeg, image/webp" multiple>
                            <div class="mt-2 text-sm text-gray-500">
                                Foto Item. Lebih dari satu foto dapat diupload. Opsional.
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3 px-3 mt-4 mb-6 mx-3">

                        <!--Harga-->

                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Harga</label>
                            <input type="number" name="price" value="{{ old('price') ?? $item->price }}" id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Price">
                            <div class="mt-2 text-sm text-gray-500">
                                Harga Item. Angka. Contoh: 1000000. Wajib diisi.
                            </div>
                        </div>

                        <!--Star-->

                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Rating</label>
                            <input type="number" name="star" value="{{ old('star') ?? $item->star }}" id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Rating" min="1" max="5" step=".01">
                            <div class="mt-2 text-sm text-gray-500">
                                Rating Item. Angka. Contoh: 5. Opsional.
                            </div>
                        </div>

                        <!--Total Review-->

                        <div class="w-full">
                            <label for="grid-last-name"
                                class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Review</label>
                            <input type="number" name="review" value="{{ old('review') ?? $item->review }}" id="grid-last-name"
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Review" min="1" max="5" step=".01">
                            <div class="mt-2 text-sm text-gray-500">
                                Review Item. Angka. Opsional.
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
