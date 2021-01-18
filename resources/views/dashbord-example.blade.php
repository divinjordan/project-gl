<x-app-layout>
    <div class="bg-white px-8">
        <div class="border-t border-gray-200 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="mr-2">
                        <img class="w-16 h-16 rounded-full" src="img/avatar.svg" alt="user_avatar">
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800"> Bienvenue, {{ auth()->user()->name }}</h3>
                        @if (auth()->user()->email_verified_at == null)
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                            <span class="bg-red-400 rounded-full mr-1.5  inline-block text-center flex items-center justify-center mr-1.5 h-5 w-5">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </span>
                                Compte non verifié
                            </div>
                        @else
                        <div class="flex items-center text-sm text-gray-500">
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <span class="bg-green-400 rounded-full inline-block text-center flex items-center justify-center mr-1.5 h-5 w-5">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </span>
                                Compte verifié
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                
                    <span class="hidden sm:block ml-3">
                      <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <!-- Heroicon name: link -->
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Demarrer une evaluation
                      </button>
                    </span>
                
                    <span class="sm:ml-3">
                      <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <!-- Heroicon name: check -->
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Creer une evaluation
                      </button>
                    </span>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>