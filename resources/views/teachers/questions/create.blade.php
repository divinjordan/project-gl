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
    <div class="p-8 text-gray-900" x-init="init" x-data="createQuestion()">
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
                      <template x-for="item in courses">
                          <option x-bind:value="item.id" x-text="item.course_title"></option> 
                      </template>
                    </select>
                  </div>
                <div>
                <div class="mb-4">
                    <div class="mt-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Intitulé de la question
                        </label>
                        <div class="mt-1">
                          <textarea id="title"  x-model="questionTitle"  value="old('description')"rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Intitule de la question"></textarea>
                        </div>
                    </div>
                </div>
                    <fieldset>
                        <legend class="text-base font-medium">Les reponses</legend>
                        <small class="text-sm"> Chocher la ou les reponses juste(s)</small>
                        <div class="mt-2 space-y-2">
                          <template x-for="item in responses">
                            <div class="flex items-center border-b border-gray-100 py-2 justify-between ">
                                <div>
                                    <div class="flex items-center h-5">
                                        <input x-bind:id="item.id" x-bind:value="item.id" x-model="corrects" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded  mr-4">
                                        <label x-bind:for="item.id" x-text="item.text" x-show="!item.editBool" class="font-medium text-gray-700"></label>
                                        <div class="inline-flex" x-show="item.editBool">
                                            <input x-bind:value="item.text" x-model="item.text" type="text" x-model="responseEditedValude" class="focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm h-8 border-gray-300 rounded-md rounded-r-none">
                                            <button x-on:click="item.editBool = false" class="py-1 px-2 bg-indigo-600 rounded-md text-white rounded-l-none"> 
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-around">
                                    <button x-on:click="item.editBool = true" x-show="!item.editBool" class="py-1 px-2 bg-indigo-600  rounded-sm rounded-r-none text-white"  > 
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                    <button class="py-1 px-2 bg-red-400  rounded-sm rounded-l-none text-white" x-bind:data-id="item.id"  x-on:click="deleteResponse" > 
                                        <svg class="w-5 h-5" x-bind:data-id="item.id" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
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
                    <button x-on:click="store" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Creer
                    </button>
                </div>
            </form>
        </div>   
     </div>
</x-app-layout>