<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Santri</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- AOS -->
     <link
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
      rel="stylesheet"
    />

    <!-- My style -->
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style.css" />
    
    
<?php include('../assets/header.php') ?>
  </head>
  <body>

    <!-- Hero Section -->
    <section
      class="relative bg-gradient-to-r from-green-600 to-green-800 text-white py-16"
    >
      <div
        class="container mx-auto px-4 flex flex-col md:flex-row items-center"
      >
        <div class="md:w-1/2 mb-8 md:mb-0 animate-fadeIn">
          <h2 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
            Informasi Santri Pesantren Modern
          </h2>
          <p class="text-xl mb-6 opacity-90">
            Portal informasi lengkap untuk santri, wali santri, dan pengelola
            pesantren.
          </p>
          <div
            class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4"
          >
            <a
              href="#santri-data"
              class="bg-white text-green-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition shadow-md text-center"
              >Lihat Data Santri</a
            >
            <a
              href="#prestasi"
              class="border-2 border-white px-6 py-3 rounded-lg font-medium hover:bg-white hover:text-green-700 transition shadow-md text-center"
              >Prestasi Santri</a
            >
          </div>
        </div>
        <div
          class="md:w-1/2 flex justify-center animate-fadeIn"
          style="animation-delay: 0.2s"
        >
          <img
            src="https://placehold.co/600x400"
            alt="Sekelompok santri sedang belajar bersama di ruangan kelas dengan papan tulis besar, suasana pendidikan Islami"
            class="rounded-lg shadow-xl"
          />
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-white">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
          <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
            <div class="text-green-600 text-4xl font-bold mb-2">1,245</div>
            <div class="text-gray-600">Total Santri</div>
          </div>
          <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
            <div class="text-green-600 text-4xl font-bold mb-2">32</div>
            <div class="text-gray-600">Asrama</div>
          </div>
          <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
            <div class="text-green-600 text-4xl font-bold mb-2">45</div>
            <div class="text-gray-600">Pengajar</div>
          </div>
          <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
            <div class="text-green-600 text-4xl font-bold mb-2">17</div>
            <div class="text-gray-600">Program Tahfiz</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Santri Data Section -->
    <section id="santri-data" class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Data Santri</h2>
          <div class="w-24 h-1 bg-green-600 mx-auto"></div>
        </div>

        <div
          class="mb-8 flex flex-col md:flex-row justify-between items-center"
        >
          <div class="relative w-full md:w-64 mb-4 md:mb-0">
            <input
              type="text"
              placeholder="Cari santri..."
              class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            />
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
          </div>
          <div class="flex space-x-2">
            <button
              class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition"
            >
              Tambah Santri
            </button>
            <button
              class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition"
            >
              Ekspor Data
            </button>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    NIS
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Nama Santri
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Asrama
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Kelas
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Status
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                  >
                    2023001
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img
                          src="https://placehold.co/40x40"
                          alt="Foto profil santri laki-laki dengan peci putih dan senyum ramah"
                          class="h-10 w-10 rounded-full"
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Ahmad Zulfikar
                        </div>
                        <div class="text-sm text-gray-500">Jakarta</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Al-Farabi
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    X IPA 1
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                      >Aktif</span
                    >
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="#" class="text-green-600 hover:text-green-900 mr-3"
                      >Edit</a
                    >
                    <a href="#" class="text-red-600 hover:text-red-900"
                      >Hapus</a
                    >
                  </td>
                </tr>
                <!-- More santri rows... -->
                <tr>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                  >
                    2023002
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img
                          src="https://placehold.co/40x40"
                          alt="Foto profil santri perempuan dengan kerudung biru muda dan ekspresi serius"
                          class="h-10 w-10 rounded-full"
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Siti Aminah
                        </div>
                        <div class="text-sm text-gray-500">Bandung</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Aisyah
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    XI IPS 2
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                      >Aktif</span
                    >
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="#" class="text-green-600 hover:text-green-900 mr-3"
                      >Edit</a
                    >
                    <a href="#" class="text-red-600 hover:text-red-900"
                      >Hapus</a
                    >
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div
            class="bg-gray-50 px-6 py-4 flex items-center justify-between border-t border-gray-200"
          >
            <div class="flex-1 flex justify-between sm:hidden">
              <a
                href="#"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                >Sebelumnya</a
              >
              <a
                href="#"
                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                >Berikutnya</a
              >
            </div>
            <div
              class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
            >
              <div>
                <p class="text-sm text-gray-700">
                  Menampilkan
                  <span class="font-medium">1</span>
                  sampai
                  <span class="font-medium">5</span>
                  dari
                  <span class="font-medium">2</span>
                  hasil
                </p>
              </div>
              <div>
                <nav
                  class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                  aria-label="Pagination"
                >
                  <a
                    href="#"
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                  >
                    <span class="sr-only">Sebelumnya</span>
                    <i class="fas fa-chevron-left"></i>
                  </a>
                  <a
                    href="#"
                    aria-current="page"
                    class="z-10 bg-green-50 border-green-500 text-green-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                  >
                    1
                  </a>
                  <a
                    href="#"
                    class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                  >
                    2
                  </a>
                  <a
                    href="#"
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                  >
                    <span class="sr-only">Berikutnya</span>
                    <i class="fas fa-chevron-right"></i>
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Prestasi Santri -->
    <section id="prestasi" class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Prestasi Santri</h2>
          <div class="w-24 h-1 bg-green-600 mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <!-- Card Prestasi 1 -->
          <div
            class="bg-white rounded-xl shadow-md overflow-hidden santri-card transition duration-300 ease-in-out"
          >
            <div class="aspect-w-16 aspect-h-9">
              <img
                src="https://placehold.co/600x400"
                alt="Santri memenangkan lomba tilawah Al-Quran di podium dengan piala besar dan senyum bangga"
                class="w-full h-48 object-cover"
              />
            </div>
            <div class="p-6">
              <div
                class="uppercase tracking-wide text-sm text-green-600 font-semibold"
              >
                Lomba Tilawah
              </div>
              <a
                href="#"
                class="block mt-1 text-lg font-medium text-gray-900 hover:text-green-600"
                >Juara 1 MTQ Nasional 2023</a
              >
              <p class="mt-2 text-gray-500">
                Muhammad Rizki berhasil meraih juara 1 Musabaqah Tilawatil Quran
                tingkat nasional mewakili Provinsi Jawa Barat.
              </p>
              <div class="mt-4 flex items-center">
                <div class="flex-shrink-0">
                  <img
                    src="https://placehold.co/40x40"
                    alt="Foto profil santri pemenang lomba dengan pakaian lengkap islami dan ekspresi bahagia"
                    class="h-10 w-10 rounded-full"
                  />
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">
                    Muhammad Rizki
                  </p>
                  <p class="text-sm text-gray-500">XII IPA 2</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Prestasi 2 -->
          <div
            class="bg-white rounded-xl shadow-md overflow-hidden santri-card transition duration-300 ease-in-out"
          >
            <div class="aspect-w-16 aspect-h-9">
              <img
                src="https://placehold.co/600x400"
                alt="Santri presentasi di depan juri lomba karya tulis ilmiah dengan slide presentasi di belakang"
                class="w-full h-48 object-cover"
              />
            </div>
            <div class="p-6">
              <div
                class="uppercase tracking-wide text-sm text-green-600 font-semibold"
              >
                Karya Tulis
              </div>
              <a
                href="#"
                class="block mt-1 text-lg font-medium text-gray-900 hover:text-green-600"
                >Inovasi Teknologi Ramah Lingkungan</a
              >
              <p class="mt-2 text-gray-500">
                Tim santri Al-Amin berhasil meraih juara 2 LKTI tingkat provinsi
                dengan karya inovasi pengelolaan sampah berbasis digital.
              </p>
              <div class="mt-4 flex items-center">
                <div class="flex-shrink-0">
                  <img
                    src="https://placehold.co/40x40"
                    alt="Foto grup tim karya tulis ilmiah 3 santri dengan jas laboratorium dan buku di tangan"
                    class="h-10 w-10 rounded-full"
                  />
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">Tim Al-Amin</p>
                  <p class="text-sm text-gray-500">XI IPA & IPS</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Prestasi 3 -->
          <div
            class="bg-white rounded-xl shadow-md overflow-hidden santri-card transition duration-300 ease-in-out"
          >
            <div class="aspect-w-16 aspect-h-9">
              <img
                src="https://placehold.co/600x400"
                alt="Santri sedang mengikuti olimpiade matematika di ruang ujian dengan konsentrasi tinggi"
                class="w-full h-48 object-cover"
              />
            </div>
            <div class="p-6">
              <div
                class="uppercase tracking-wide text-sm text-green-600 font-semibold"
              >
                Olimpiade
              </div>
              <a
                href="#"
                class="block mt-1 text-lg font-medium text-gray-900 hover:text-green-600"
                >Medali Perak OSN Matematika</a
              >
              <p class="mt-2 text-gray-500">
                Fatimah Azzahra berhasil meraih medali perak Olimpiade Sains
                Nasional bidang Matematika mewakili Jawa Tengah.
              </p>
              <div class="mt-4 flex items-center">
                <div class="flex-shrink-0">
                  <img
                    src="https://placehold.co/40x40"
                    alt="Foto santri perempuan berjilbab dengan kacamata memegang medali di leher"
                    class="h-10 w-10 rounded-full"
                  />
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">
                    Fatimah Azzahra
                  </p>
                  <p class="text-sm text-gray-500">X IPA 3</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-12 text-center">
          <a
            href="#"
            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 shadow-lg"
          >
            Lihat Semua Prestasi
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </section>

    <!-- Tahfiz Progress Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Kemajuan Tahfiz</h2>
          <div class="w-24 h-1 bg-green-600 mx-auto"></div>
          <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
            Pantau perkembangan hafalan Al-Quran seluruh santri secara
            real-time.
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
          <!-- Progress Chart -->
          <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">
              Distribusi Juz Hafalan
            </h3>
            <div>
              <canvas id="hafalanChart" class="w-full h-64"></canvas>
            </div>
          </div>

          <!-- Top Tahfiz -->
          <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">
              5 Santri Terbaik
            </h3>
            <div class="space-y-6">
              <!-- Santri 1 -->
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-gray-700">Ahmad Fauzi</span>
                  <span class="text-sm font-medium text-gray-500">29 Juz</span>
                </div>
                <div class="progress-bar bg-gray-200 rounded-full">
                  <div
                    class="progress-value bg-green-600 rounded-full"
                    style="width: 95%"
                  ></div>
                </div>
              </div>

              <!-- Santri 2 -->
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-gray-700">Siti Khadijah</span>
                  <span class="text-sm font-medium text-gray-500">25 Juz</span>
                </div>
                <div class="progress-bar bg-gray-200 rounded-full">
                  <div
                    class="progress-value bg-green-500 rounded-full"
                    style="width: 85%"
                  ></div>
                </div>
              </div>

              <!-- Santri 3 -->
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-gray-700">Abdullah Rahman</span>
                  <span class="text-sm font-medium text-gray-500">20 Juz</span>
                </div>
                <div class="progress-bar bg-gray-200 rounded-full">
                  <div
                    class="progress-value bg-green-400 rounded-full"
                    style="width: 68%"
                  ></div>
                </div>
              </div>

              <!-- Santri 4 -->
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-gray-700">Aisyah Nur</span>
                  <span class="text-sm font-medium text-gray-500">15 Juz</span>
                </div>
                <div class="progress-bar bg-gray-200 rounded-full">
                  <div
                    class="progress-value bg-green-300 rounded-full"
                    style="width: 50%"
                  ></div>
                </div>
              </div>

              <!-- Santri 5 -->
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-gray-700">Muhammad Ali</span>
                  <span class="text-sm font-medium text-gray-500">10 Juz</span>
                </div>
                <div class="progress-bar bg-gray-200 rounded-full">
                  <div
                    class="progress-value bg-green-200 rounded-full"
                    style="width: 35%"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-12 text-center">
          <p class="text-gray-600 mb-4">
            Ingin melihat detail kemajuan tahfiz santri Anda?
          </p>
          <a
            href="#"
            class="inline-flex items-center px-6 py-3 border border-green-600 text-base font-medium rounded-md text-green-600 bg-white hover:bg-green-50 hover:border-green-700 shadow-lg"
          >
            <i class="fas fa-user-circle mr-2"></i>
            Masuk Sebagai Wali Santri
          </a>
        </div>
      </div>
    </section>

    <?php include('../assets/footer.php') ?>
  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <script src="../script/script.js"></script>
  </body>
</html>