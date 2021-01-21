<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <form method="POST" action="{{ route('facebook') }}">
            @csrf
            <!-- role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700"> Role </label>
                <select name="role" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="teacher"> Enseignant </option> 
                      <option value="student"> Etudiant </option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="block w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-700 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Continuer
                </button>
            </div>
        </form>
        <x-slot name="bottom">
            <div>
            </div>
        </x-slot> 
    </x-auth-card>
</x-guest-layout>
