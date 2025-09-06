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
            <a href="#beranda" class="ml-6 ">Beranda</a>
            <a href="#proyek" class="ml-6 ">Proyek</a>
            <a href="#kontak" class="ml-6 ">Kontak</a>
        </div>
    </nav>

    <!-- Gelombang Putih di Bawah Header -->
    <div class="relative w-full h-32 bg-blue-600 overflow-hidden">
        <svg class="absolute bottom-0 w-full h-full text-white" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="currentColor" fill-opacity="1"
                d="M0,160L60,165.3C120,171,240,181,360,192C480,203,600,213,720,197.3C840,181,960,139,1080,144C1200,149,1320,203,1380,229.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
    </div>


    <!-- Header Atas dengan Nama Perusahaan -->
    <header id="beranda" class="relative py-8 bg-white overflow-hidden">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight z-10 relative">SMK Commerce
            </h1>
        </div>
        <div class="w-1/2 mx-auto mt-6 text-center ">
            <p>SMK Commerce adalah wadah inovatif yang menampilkan berbagai proyek web karya teman-teman SMK. Dari
                website bisnis, aplikasi interaktif, hingga portofolio kreatif, semua dikumpulkan di satu tempat untuk
                memperlihatkan bakat, kreativitas, dan kemampuan teknis mereka. Temukan inspirasi, eksplorasi ide baru,
                dan lihat bagaimana karya-karya ini bisa membantu mewujudkan kebutuhan digital kamu. SMK Commerce:
                tempat kreativitas bertemu teknologi.</p>

        </div>
    </header>


    <main id="proyek" class="container mx-auto px-6 py-12">
        <!-- Judul Bagian -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">Proyek Kami</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                Lihatlah beberapa karya terbaik kami yang telah membantu klien kami mencapai tujuan mereka.
            </p>
        </div>


        <!-- Grid Portofolio -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($vendors as $vendor)
                <a href="{{ $vendor->visit_website_url }}"
                    class="group block bg-white rounded-xl overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300 ring-1 ring-gray-200">
                    <img class="w-full h-48 object-cover object-center group-hover:opacity-80 transition-opacity duration-300"
                        src="{{ $vendor->imageLink?->url }}" alt="{{ $vendor->title }}">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-gray-900">{{ $vendor->title }}</h3>
                        <p class="mt-2 text-gray-600">{{ $vendor->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <!-- Bagian Kontak -->
        <section class="mt-12 mx-8 border-t-2 mt-10" id="kontak">
            <div class="text-center mb-8  mt-8">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">Hubungi Kami</h2>
                <p class="mt-2 text-lg text-gray-600 max-w-2xl mx-auto">
                    Kami siap membantu Anda. Silakan hubungi kami melalui informasi di bawah ini.
                </p>
            </div>

            <!-- Kartu Kontak -->
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-8 ring-1 ring-gray-200">
                <div class="text-center">
                    <h3 class="text-3xl font-bold text-gray-900">SMKN 11 Malang</h3>
                    <p class="mt-4 text-gray-600">
                        Jl. Pelabuhan Bakahuni No.1, Bakalankrajan,
                        <br>
                        Kec. Sukun, Kota Malang, Jawa Timur 65148
                    </p>
                    <div class="mt-6 border-t pt-4">
                        <p class="text-gray-900 font-semibold">Email:</p>
                        <a href="mailto:customer@smkcommerce.my.id"
                            class="text-blue-600 hover:underline">customer@smkcommerce.my.id</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-8 mt-12 text-center text-gray-600">
        <p>&copy; 2025 SMK Commerce.</p>
    </footer>

</body>

</html>
