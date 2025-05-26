<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>  
<div class="container mx-auto px-4 sm:px-8 mt-10">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight text-blue-800">Daftar Produk</h2>
        </div>
        <div class="my-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 bg-blue-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-5 py-3 bg-blue-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Nama Produk
                            </th>
                            <th class="px-5 py-3 bg-blue-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Deskripsi Produk
                            </th>
                            <th class="px-5 py-3 bg-blue-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Harga Produk
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nama as $index => $item)
                        <tr class="border-b border-gray-200 bg-white hover:bg-gray-50">
                            <td class="px-5 py-5 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-5 py-5 text-sm text-gray-900">{{ $item }}</td>
                            <td class="px-5 py-5 text-sm text-gray-900">{{ $desc[$index] }}</td>
                            <td class="px-5 py-5 text-sm text-gray-900">Rp {{ number_format($harga[$index], 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</head>
</body>
