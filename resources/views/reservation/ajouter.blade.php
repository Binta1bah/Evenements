<x-guest-layout>


    <form method="POST" action="{{ route('reserver') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nbPlace" :value="__('Nombre de Place')" />
            <x-text-input id="nbPlace" class="block mt-1 w-full" type="number" name="nbPlace" :value="old('nbPlace')" required autofocus autocomplete="nbPlace" />
            <x-input-error :messages="$errors->get('nbPlace')" class="mt-2" />
        </div><br>

        <!-- dateEvenement Address -->

        @auth
        <input type="hidden" name="client" value="{{ Auth::user()->id }}">
        @endauth

        <input type="hidden" name="evenement" value="{{ $evenement->id }}">

        <x-primary-button class="ms-4">
            {{ __('Reserver') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>