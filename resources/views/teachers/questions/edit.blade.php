<x-app-layout>
    <div class="bg-white px-8">
        <div class="border-t border-gray-200 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700">Créer une question </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="p-8" x-init="init" x-data="editQuestion({{ $question->id }})">
        <div class="rounded-lg shadow-sm bg-white p-8">
            <x-custom-validation-errors :errors="$errors" />    
            <div>
                <template x-if="errors.length">
                    <ul class="mb-4 list-disc list-inside text-sm text-red-600">
                        <template x-for="item in errors">
                            <li x-text="item"></li>
                        </template>
                    </ul>
                </template>

                <div class="mb-4">
                    <label for="course" class="block text-sm font-medium text-gray-700"> Cours </label>
                    <select name="course" x-model="course" autocomplete="country" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @foreach ($courses as $item)
                          <option value="{{ $item->id }}"> {{ $item->course_title }}</option>
                      @endforeach
                    </select>
                  </div>
                <div>
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Intitulé de la question</label>
                    <input type="text" x-model="question" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">Les reponses</legend>
                        <div class="mt-2 space-y-2">
                          <template x-for="item in responses">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input x-bind:id="item.id" x-bind:value="item.id" x-model="correct" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                  <label x-bind:for="item.id" class="font-medium text-gray-700" x-text="item.text"></label>
                                </div>
                              </div>
                          </template>
                        </div>
                        <div class="mt-4">
                            <label for="title" class="block text-sm font-medium text-gray-700"> Entrer une reponse</label>
                            <div class="flex items-center">
                                <input type="text" x-model="response" autocomplete="given-name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-r-none">
                                <button x-on:click.prevent="addResponse" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-l-none">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="mt-4">
                    <button x-on:click="save" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>   
     </div>
</x-app-layout>