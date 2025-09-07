<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Commerce</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-900 antialiased">

    <nav id="main-nav" class="sticky bg-[#155dfc] text-white top-0 left-0 right-0 z-50 py-4">
        <div class="container mx-auto px-6 text-center">
            <a href="/#beranda" class="ml-6 ">Beranda</a>
            <a href="/#proyek" class="ml-6 ">Proyek</a>
            <a href="/#kontak" class="ml-6 ">Kontak</a>
        </div>
    </nav>


    <main id="proyek" class="flex-grow container mx-auto px-6 py-12 flex items-center justify-center">
        <!-- Card Informasi -->
        <div class="bg-white rounded-lg shadow-xl p-8 max-w-4xl w-full min-h-screen md:min-h-screen md:h-auto">
            <h1 class="text-4xl font-bold text-center text-[#155dfc] mb-6">
                {{ $information->title }}
            </h1>

            <div class="prose max-w-none text-gray-700 leading-relaxed text-lg">
                {!! nl2br(e($information->content)) !!}
            </div>
        </div>
    </main>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <!-- Kolom 1: Hak Cipta -->
                <div class="space-y-2">
                    <p class="text-sm font-semibold">&copy; 2025, SMK Commerce</p>
                </div>

                <!-- Kolom 2: Tautan Halaman -->
                <div class="space-y-2 flex gap-2 text-left">
                    <h3 class="text-sm font-semibold mb-2">Informasi</h3>
                    <ul class="">
                        @forelse ($informations as $information)
                            <li>
                                <a href="{{ route('informations.show', $information->id) }}"
                                    class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">
                                    {{ $information->title }}
                                </a>
                            </li>
                        @empty
                            <li class="text-gray-500 text-sm">Belum ada informasi.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Kolom 3: Kemitraan -->
                <div class="space-y-2 flex gap-2 text-left">
                    <h3 class="text-sm font-semibold mb-2">Partnership</h3>
                    <ul class="">
                        @forelse ($partnerships as $partnership)
                            <li><a href="{{ $partnership->partner_url }}" target="_blank" rel="noopener"
                                    class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">{{ $partnership->title }}</a>
                            </li>
                        @empty
                            <li><a href="#kontak"
                                    class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Kemitraan
                                    Perusahaan</a></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
