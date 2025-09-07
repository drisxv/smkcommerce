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
        @forelse ($abouts as $about)
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight z-10 relative">
                    {{ $about->title }}
                </h1>
            </div>
            <div class="w-1/2 mx-auto mt-6 text-center ">
                <p></p>{!! nl2br(e($about->description)) !!}</p>
            </div>
        @empty
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight z-10 relative">SMK Commerce
                </h1>
            </div>
            <div class="w-1/2 mx-auto mt-6 text-center ">
                <p>SMK Commerce adalah wadah inovatif yang menampilkan berbagai proyek web karya teman-teman SMK. Dari
                    website bisnis, aplikasi interaktif, hingga portofolio kreatif, semua dikumpulkan di satu tempat
                    untuk
                    memperlihatkan bakat, kreativitas, dan kemampuan teknis mereka. Temukan inspirasi, eksplorasi ide
                    baru,
                    dan lihat bagaimana karya-karya ini bisa membantu mewujudkan kebutuhan digital kamu. SMK Commerce:
                    tempat kreativitas bertemu teknologi.</p>

            </div>
        @endforelse
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
            <div class="text-center mb-8 mt-8">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">Hubungi Kami</h2>
                <p class="mt-2 text-lg text-gray-600 max-w-2xl mx-auto">
                    Kami siap membantu Anda. Silakan hubungi kami melalui informasi di bawah ini.
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-6 w-full">
                @forelse($contacts as $contact)
                    <!-- Kartu Kontak -->
                    <div class="flex-1 min-w-[280px] max-w-md bg-white rounded-xl shadow-lg p-8 ring-1 ring-gray-200">
                        <div class="text-center">
                            <!-- Nama -->
                            <h3 class="text-3xl font-bold text-gray-900">
                                {{ $contact->name ?? 'SMKN 11 Malang' }}
                            </h3>

                            <!-- Alamat -->
                            @if ($contact->address)
                                <p class="mt-4 text-gray-600">
                                    {!! nl2br(e($contact->address)) !!}
                                </p>
                            @endif

                            <div class="mt-6 border-t pt-4 space-y-2">
                                <!-- Email -->
                                @if ($contact->email)
                                    <p class="text-gray-900 font-semibold">Email:</p>
                                    <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:underline">
                                        {{ $contact->email }}
                                    </a>
                                @endif

                                <!-- Nomor Telepon -->
                                @if ($contact->phone_number)
                                    <p class="text-gray-900 font-semibold mt-2">Telepon:</p>
                                    <a href="tel:{{ $contact->phone_number }}" class="text-blue-600 hover:underline">
                                        {{ $contact->phone_number }}
                                    </a>
                                @endif

                                <!-- Social Media -->
                                @if ($contact->social_media)
                                    <p class="text-gray-900 font-semibold mt-2">Sosial Media:</p>
                                    <a href="{{ $contact->social_media }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        {{ $contact->social_media }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Kartu Kontak Default -->
                    <div class="flex-1 min-w-[280px] max-w-md bg-white rounded-xl shadow-lg p-8 ring-1 ring-gray-200">
                        <div class="text-center">
                            <h3 class="text-3xl font-bold text-gray-900">SMKN 11 Malang</h3>
                            <p class="mt-4 text-gray-600">
                                Jl. Pelabuhan Bakahuni No.1, Bakalankrajan,
                                <br>
                                Kec. Sukun, Kota Malang, Jawa Timur 65148
                            </p>
                            <div class="mt-6 border-t pt-4">
                                <p class="text-gray-900 font-semibold">Email:</p>
                                <a href="mailto:customer@smkcommerce.my.id" class="text-blue-600 hover:underline">
                                    customer@smkcommerce.my.id
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>
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
