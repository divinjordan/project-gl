<x-app-layout>
    <div class="bg-white px-8">
        <div class="border-t border-gray-200 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700">Vos evaluations</h3>
                </div>
                <a href="/evaluations/create" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <!-- Heroicon name: check -->
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Creer une evaluation
                </a>
            </div>
        </div>
    </div>
    <div class="p-8">
       <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Titre de l'evaluation
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                         Nombre de questions
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach (auth()->user()->evaluations as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                               {{$item->evaluation_title}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $item->evaluation_description }}
                            </td>
                           
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ count($item->questions) }}
                            </td>
                            <td class="flex justify-between px-6 py-4 whitespace-nowrap text-right text-sm font-medium" x-data="{}">
                                <a href="{{ url('/evaluations/'.$item->id.'/edit') }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                <form method="post" action="evaluations/{{ $item->id }}" x-ref="form">
                                    @method('DELETE')
                                    @csrf
                                    <button class="text-red-600 hover:text-red-900" x-on:click.prevent="if(confirm('Confirmer suppression')){$refs.form.submit()}">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    <!-- More items... -->
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
   
     </div>
</x-app-layout>
