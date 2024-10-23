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
                <div class="p-6 text-gray-900">
                    
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Hasil</h2>
    
                    <hr class="border-t border-gray-400 mb-6">
    
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="email" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Masukan Email</label>
                        <input type="email" id="email" name="email" value="{{ $mahasiswa->email }}" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>
                    </div>
                
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="nomor_hp" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Nomor HP</label>
                        <input type="text" id="nomor_hp" name="nomor_hp" value="{{ $mahasiswa->nomor_hp }}" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>
                    </div>
                
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="semester" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Semester saat ini</label>
                        <input type="text" id="semester" name="semester" value="{{ $mahasiswa->semester }}" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>
                    </div>
                
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="ipk" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">IPK terakhir</label>
                        <input type="text" id="ipk" name="ipk" value="{{ $mahasiswa->ipk }}" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>
                    </div>                        
                
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="pilihan_beasiswa" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Pilihan Beasiswa</label>
                        <input type="text" id="pilihan_beasiswa" name="pilihan_beasiswa" value="{{ $mahasiswa->beasiswa ? $mahasiswa->beasiswa->nama : 'N/A' }}" class="mt-1 block w-full sm:w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>
                    </div>
                                                                
                
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="berkas_syarat" class="block text-base font-medium text-gray-700 w-full sm:w-1/3">Upload Berkas Syarat</label>
                        <div class="w-full sm:w-2/3">
                            <div class="mt-2 text-base text-gray-600">
                                <a href="{{ asset('storage/' . $mahasiswa->berkas_syarat) }}" 
                                target="_blank" 
                                download="{{ $mahasiswa->original_berkas }}" 
                                class="text-blue-500 hover:underline">
                                    {{ $mahasiswa->original_berkas }}
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <div class="flex flex-col sm:flex-row">
                        <div class="block w-full bg-green-400 border border-green-500 rounded-md p-4 text-center">
                            <span class="text-white font-medium text-lg">
                                {{ $mahasiswa->statusAjuan ? $mahasiswa->statusAjuan->status : 'N/A' }}
                            </span>
                        </div>
                    </div>                        
                </div>
                <div class="flex items-center justify-end mt-0 m-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-primary-button type="button" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Kembali') }}
                        </x-primary-button>
                    </form>
                </div> 
            </div>               
        </div>
    </div>    
    
</x-app-layout>
