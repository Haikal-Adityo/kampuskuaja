<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autofocus />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="my-2 w-full">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>              
        
    </form>
</x-guest-layout>