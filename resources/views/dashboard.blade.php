<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @auth

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bienvenue:") }} {{Auth::User()->nom}}

                    <main class="container mx-auto mt-8">
                        <div class="flex flex-wrap justify-between">



                            <h2 class="text-4xl font-bold ">Mes evenements</h2>

                            <div class="flex flex-wrap -mx-4">

                                @foreach($evenements as $eve)
                                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 px-4 mb-4">
                                    <div class="bg-white p-4 rounded shadow">
                                        <!-- Image de l'événement -->
                                        <a href="{{ route('details', ['id' => $eve->id]) }}">
                                            <img src="{{ asset($eve->image) }}" alt="Event Image" class="w-full h-40 object-cover rounded mb-2">
                                        </a>

                                        <!-- Date de l'événement -->
                                        <h3 class="text-lg font-bold">Evenement: {{ $eve->libelle }}</h3>
                                        <p class="text-gray-600 text-sm">Date: {{ $eve->dateEvenement }}</p>

                                        <!-- Nom de l'événement -->

                                    </div>
                                </div>
                                @endforeach

                            </div>




                        </div>

                        {{-- Aside Part --}}


                </div>
                </main>
            </div>
        </div>
    </div>
    </div>

    @endauth
</x-app-layout>