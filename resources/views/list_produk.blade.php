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
        
        <!-- Form Input Produk -->
        <div class="bg-white p-8 rounded-2xl shadow-md mb-10 transition hover:shadow-xl">
            <h2 class="text-2xl font-semibold mb-6 text-rose-600">Input Produk</h2>
            <form method="POST" action="{{ route('produk.simpan') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-1">Nama Produk</label>
                        <input type="text" class="w-full border border-rose-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" id="nama" name="nama" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-1">Harga</label>
                        <input type="number" class="w-full border border-rose-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" id="harga" name="harga" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-rose-700 mb-1">Deskripsi</label>
                        <textarea class="w-full border border-rose-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-rose-600 hover:bg-rose-700 transition text-white px-6 py-2 rounded-lg font-medium shadow">
                        Simpan
                    </button>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nama as $index => $item)
                        <tr class="border-b border-rose-200 bg-white hover:bg-rose-50 transition">
                            <td class="px-5 py-4 text-slate-900">{{ $index + 1 }}</td>
                            <td class="px-5 py-4 text-slate-900">{{ $item }}</td>
                            <td class="px-5 py-4 text-slate-900">{{ $desc[$index] }}</td>
                            <td class="px-5 py-4 text-slate-900">Rp {{ number_format($harga[$index], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
