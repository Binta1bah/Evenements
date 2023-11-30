<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Information detaillees de l'article</title>
</head>



<body>

    @auth('association')

    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{route('assos.dashboard')}}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Acceuil</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"></a>
                            <a href="{{route('ajouterEvenement')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Ajouter un evenement</a>
                            <form method="post" action="{{ route('assos.logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('assos.logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Deconnexion') }}
                                </x-responsive-nav-link>
                            </form>

                            <!-- <a href="route('assos.logout')" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Deconnexion</a> -->
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>

                        <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
            </div>
        </div>
    </nav>

    @endauth



    <div class="sm:mx-auto sm:w-full my-14">
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
            Detail de l'évenement : {{ $evenement->libelle }}
        </h2>
    </div>



    <main class="container mx-auto mt-8">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-8/12 px-4 mb-8">
                <img src="{{asset($evenement->image)}}" alt="Featured Image" class="w-full h-64 object-cover rounded">
                <div class="flex flex-wrap justify-between items-center my-4">
                    <h2 class="text-4xl font-bold ">{{ $evenement->libelle }}</h2>

                    @auth('association')

                    @if ($evenement->is_clotured == 0)
                    <form action="{{ route('cloturer', ['id' => $evenement->id]) }}" method="post">
                        @csrf


                        <button class="bg-green-200 font-bold text-stone-800 rounded-lg text-xs text-center self-center px-3 py-2 mx-2">

                            Cloturer l'evenement
                        </button>
                    </form>
                    @else
                    <h2 class="bg-green-200 font-bold text-stone-800 rounded-lg text-xs text-center self-center px-3 py-2 mx-2">Ce évenement est cloturé</h2>
                    @endif

                    @endauth





                </div>

                <p class="text-gray-700 mb-4 font-bold">{{$evenement->description}}</p>
                <p class="text-gray-700 mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore
                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
                <p class="text-gray-700 mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto beatae vitae dicta sunt explicabo.</p>

            </div>

            {{-- Aside Part --}}
            <div class="w-full md:w-4/12 px-4 mb-8">
                <div class=" px-4 py-6 rounded">
                    <h3 class="text-lg font-bold mb-2">Date de l'évenement: {{ $evenement->dateEvenement }}</h3>


                    <div class="flex  gap-2 flex-wrap ">
                        <span class="bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600">Date limite d'inscription: {{ $evenement->dateLimitEvenement }}</span>

                    </div>
                </div>

                @auth('association')
                <div class="mt-5">


                    <a href="{{ route('modifdetail', ['id' => $evenement->id]) }}" class="bg-green-500  text-white font-bold py-2 px-4 rounded mr-3">
                        Modifier l'évenemnt
                    </a>



                    <a href="{{ route('supprimer', ['id' => $evenement->id]) }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                        Supprimer l'évenement
                    </a>


                </div>
                @endauth

                <div class="mt-5">

                    @if ($evenement->is_clotured == 0)

                    <a href="{{ route('reservation', ['id' => $evenement->id]) }}" class="bg-green-500  text-white font-bold py-2 px-4 rounded mr-3">
                        S'inscrire à l'evenement
                    </a>

                    @endif



                </div>
            </div>
        </div>
    </main>

</body>

</html>