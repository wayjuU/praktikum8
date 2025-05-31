<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-rose-100 min-h-screen">

    <!-- Header -->
    <div class="text-center mt-10 mb-6">
        <h1 class="text-4xl font-bold text-rose-600">Daftar Produk</h1>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif

        {{-- Alert error --}}
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif

        <!-- Form Input / Update Produk -->
        <div class="bg-white p-8 rounded-2xl shadow-md mb-10 transition hover:shadow-xl">
            <h2 class="text-2xl font-semibold mb-6 text-rose-600">
                {{ $produk ? 'Edit Produk' : 'Input Produk' }}
            </h2>

            <form method="POST" action="{{ $produk ? route('produk.update', $produk->id) : route('produk.simpan') }}">
                @csrf
                @if ($produk)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-1">Nama Produk</label>
                        <input type="text" 
                               class="w-full border border-rose-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" 
                               name="nama" value="{{ old('nama', $produk->nama ?? '') }}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-1">Harga</label>
                        <input type="number" 
                               class="w-full border border-rose-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" 
                               name="harga" value="{{ old('harga', $produk->harga ?? '') }}" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-rose-700 mb-1">Deskripsi</label>
                        <textarea class="w-full border border-rose-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" 
                                  name="deskripsi" rows="3" required>{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" 
                            class="bg-rose-600 hover:bg-rose-700 transition text-white px-6 py-2 rounded-lg font-medium shadow">
                        {{ $produk ? 'Update' : 'Simpan' }}
                    </button>

                    @if ($produk)
                        <a href="{{ route('produk.show') }}" class="ml-4 text-rose-600 hover:underline font-semibold">Batal</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Tabel Daftar Produk -->
        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto mb-10 transition hover:shadow-xl">
            <h2 class="text-xl font-semibold mb-4 text-rose-600">Tabel Produk</h2>
            <table class="min-w-full leading-normal text-sm">
                <thead>
                    <tr class="bg-rose-200">
                        <th class="px-5 py-3 text-left font-semibold text-rose-700 uppercase tracking-wider">No</th>
                        <th class="px-5 py-3 text-left font-semibold text-rose-700 uppercase tracking-wider">Nama Produk</th>
                        <th class="px-5 py-3 text-left font-semibold text-rose-700 uppercase tracking-wider">Deskripsi Produk</th>
                        <th class="px-5 py-3 text-left font-semibold text-rose-700 uppercase tracking-wider">Harga Produk</th>
                        <th class="px-5 py-3 text-left font-semibold text-rose-700 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nama as $index => $item)
                        <tr class="border-b border-rose-200 bg-white hover:bg-rose-50 transition">
                            <td class="px-5 py-4 text-slate-900">{{ $index + 1 }}</td>
                            <td class="px-5 py-4 text-slate-900">{{ $item }}</td>
                            <td class="px-5 py-4 text-slate-900">{{ $desc[$index] }}</td>
                            <td class="px-5 py-4 text-slate-900">Rp {{ number_format($harga[$index], 0, ',', '.') }}</td>
                            <td class="px-5 py-4">

                                <!-- Edit Action -->
                                <a href="{{ route('produk.edit', $id[$index]) }}" 
                                   class="text-blue-600 hover:text-blue-800 font-semibold mr-4">
                                   Edit
                                </a>

                                <!-- Delete Action -->
                                <form action="{{ route('produk.delete', $id[$index]) }}" method="POST" 
                                      onsubmit="return confirm('Apakah yakin ingin menghapus {{ $item }}?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
