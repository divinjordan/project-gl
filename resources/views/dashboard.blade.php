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
    <div class="p-8">

        @if (auth()->user()->email_verified_at == null)
        <div class="rounded-lg p-4 shadow bg-red-400 text-white my-4">
            Merci de vous être inscrits ! Avant de commencer, pourriez-vous vérifier votre adresse électronique en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu ce courriel, nous vous en enverrons un autre avec plaisir.                
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="mt-2">
                        <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <!-- Heroicon name: check -->
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Envoyer un nouvel email
                          </button>
                    </div>
                </form>                       
        </div>
        @endif

        <div class="flex w-ful space-x-4">
            <div class="flex-1 bg-white shadow rounded-lg">
                <div class="flex space-x-4 items-center p-4">
                    <div class="text-gray-400 font-semibold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-gray-500 font-semibold"> Questions </h4>
                        <h3 class="text-xl text-gray-900 font-semibold"> 10 </h3>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 text-indigo-700 rounded-b-lg">
                    Details
                </div>
            </div>
                <div class="flex-1 bg-white shadow rounded-lg">
                    <div class="flex space-x-4 items-center p-4">
                        <div class="text-gray-400 font-semibold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-500 font-semibold"> Evaluations </h4>
                            <h3 class="text-xl text-gray-900 font-semibold"> 10 </h3>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-4 text-indigo-700 rounded-b-lg">
                        Details
                    </div>
                </div>
                <div class="flex-1 bg-white shadow rounded-lg">
                    <div class="flex space-x-4 items-center p-4">
                        <div class="text-gray-400 font-semibold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-500 font-semibold"> Etudiants </h4>
                            <h3 class="text-xl text-gray-900 font-semibold"> 10 </h3>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-4 text-indigo-700 rounded-b-lg">
                        Details
                    </div>
                </div>
            </div>  
            <div class="mt-12">
                <h3 class="font-bold text-gray-900"> Demandes d'autorisation recentes </h3>    
                <!-- Begin the table block -->
                <div class="flex flex-col mt-2">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        Jane Cooper
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        jane.cooper@example.com
                                    </div>
                                    </div>
                                </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                <div class="text-sm text-gray-500">Optimization</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Admin
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                
                            <!-- More items... -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End of table block -->
            </div>             
        </div>
    </div>
</x-app-layout>
