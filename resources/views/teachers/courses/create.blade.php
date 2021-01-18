<x-app-layout>
    <div class="bg-white px-8">
        <div class="border-t border-gray-200 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700">Creer un cours</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="p-8">
        <div class="rounded-lg shadow-sm bg-white p-8">
            <x-custom-validation-errors :errors="$errors" />    
            <form method="post" action="{{ url('courses') }}">
                @csrf
                <div class="">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Titre du cours</label>
                    <input type="text" name="title"  id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                      Description
                    </label>
                    <div class="mt-1">
                      <textarea id="description" name="description"  value="old('description')"rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Description du cours"></textarea>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Creer
                    </button>
                </div>
            </form>
        </div>   
     </div>
</x-app-layout>