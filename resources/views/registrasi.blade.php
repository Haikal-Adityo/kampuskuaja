<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang, ' . $mahasiswa->nama) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div id="error-alert" class="p-4 mb-4 text-base text-red-700 bg-red-100 rounded-lg" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form id="registrasi_form" method="POST" action="{{ route('registrasi.store') }}" enctype="multipart/form-data"> 
                    @csrf
                    @method('POST')

                    <div class="p-6 text-gray-900">
                        
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Registrasi Beasiswa</h2>

                        <hr class="border-t border-gray-400 mb-6">

                        <div class="mb-4 flex flex-col sm:flex-row">
                            <label for="email" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Masukan Email</label>
                            <input type="email" id="email" name="email" value="{{ $mahasiswa->email }}" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                    
                        <div class="mb-4 flex flex-col sm:flex-row">
                            <label for="nomor_hp" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Nomor HP</label>
                            <input type="text" id="nomor_hp" name="nomor_hp" value="{{ $mahasiswa->nomor_hp }}" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                    
                        <div class="mb-4 flex flex-col sm:flex-row">
                            <label for="semester" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Semester saat ini</label>
                            <select id="semester" name="semester" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="">Pilih Semester</option>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ $mahasiswa->semester == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    
                        <div class="mb-4 flex flex-col sm:flex-row">
                            <label for="ipk" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">IPK terakhir</label>
                            <input type="text" id="ipk" name="ipk" value="{{ $mahasiswa->ipk }}" class="mt-1 block w-full sm:w-2/3 bg-gray-300 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>
                        </div>                        
                    
                        @if ($mahasiswa->ipk >= 3.0)
                            <div class="mb-4 flex flex-col sm:flex-row">
                                <label for="pilihan_beasiswa" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Pilihan Beasiswa</label>
                                <select id="pilihan_beasiswa" name="pilihan_beasiswa" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">-- Pilih Beasiswa --</option>
                                    @foreach ($beasiswaList as $beasiswa)
                                        <option value="{{ $beasiswa->id }}" {{ $mahasiswa->beasiswa_id == $beasiswa->id ? 'selected' : '' }}>
                                            {{ $beasiswa->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>                                              
                        
                            <div class="mb-4 flex flex-col sm:flex-row">
                                <label for="berkas_syarat" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Upload Berkas Syarat</label>
                                <div class="w-full sm:w-2/3">
                                    @if ($mahasiswa->berkas_syarat)
                                        <div class="mt-2 text-base text-gray-600">
                                            <a href="{{ asset('storage/' . $mahasiswa->berkas_syarat) }}" 
                                            target="_blank" 
                                            download="{{ $mahasiswa->original_berkas }}" 
                                            class="text-blue-500 hover:underline">
                                                {{ $mahasiswa->original_berkas }}
                                            </a>
                                        </div>
                                    @endif                            
                                    <input type="file" id="berkas_syarat" name="berkas_syarat" class="mt-1 block rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required onchange="updateFileName()">
                                </div>
                            </div>   
                        @else
                            <div class="flex flex-col sm:flex-row">
                                <div class="block w-full bg-red-500 border border-red-600 rounded-md p-4 text-center">
                                    <span class="text-white font-medium text-lg">
                                        IPK Anda Tidak Cukup
                                    </span>
                                </div>
                            </div>
                        @endif

                    </div>
                    
                </form>

                @if ($mahasiswa->ipk >= 3.0)
                    <div class="flex items-center justify-between mt-0 m-6">
                        <x-primary-button type="button" onclick="document.getElementById('registrasi_form').submit();">
                            {{ __('Daftar') }}
                        </x-primary-button>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-primary-button type="button" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Kembali') }}
                            </x-primary-button>
                        </form>
                    </div>
                @else
                <div class="flex items-center justify-end mt-0 m-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-primary-button type="button" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Kembali') }}
                        </x-primary-button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Set a timer to fade out the alert after 3 seconds
        setTimeout(() => {
            const alert = document.getElementById('error-alert');
            if (alert) {
                alert.classList.add('fade-out');
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 500);
            }
        }, 3000);

        function updateFileName() {
            const fileInput = document.getElementById('berkas_syarat');
            const fileNameDisplay = fileInput.previousElementSibling; // Get the filename display div
    
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name; // Update the display with the new filename
            } else {
                fileNameDisplay.textContent = ''; // Clear if no file selected
            }
        }

    </script>
    
</x-app-layout>
