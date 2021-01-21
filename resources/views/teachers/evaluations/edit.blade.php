<x-app-layout>
    <div class="bg-white px-8">
        <div class="border-t border-gray-200 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700">Creer une evaluation </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="p-8" x-init="init" x-data="updateEvaluation({{ $evaluation->id }})">
        <template x-if="errors.length">
            <ul class="mb-4 list-disc list-inside text-sm text-red-600">
                <template x-for="item in errors">
                    <li x-text="item"></li>
                </template>
            </ul>
        </template>
        <div class="rounded-lg shadow-sm bg-white p-8">
                <div class="">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Titre de l'evaluation </label>
                    <input type="text" x-model="evaluationTitle" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                      Description
                    </label>
                    <div class="mt-1">
                      <textarea id="description" x-model="evaluationDescription" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Description de l'evaluation"></textarea>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="course" class="block text-sm font-medium text-gray-700"> Cours </label>
                    <select name="course" x-on:change="changeCourse" x-model="courseId" autocomplete="country" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <template x-for="item in courses">
                          <option x-bind:value="item.id" x-text="item.course_title"></option> 
                      </template>
                    </select>
                </div>
               
        </div> 
        <div class="rounded-lg shadow-sm bg-white p-8 mt-4">
            <div class="flex justify-between">  
                <h3 class="text-xl text-gray-900"> Choix des questions </h3>
                <div class="text-gray-900">
                    Nombre: <span x-text="chooses.length"></span>
                </div>
            </div>
            <div class="mt-2 space-y-2">
                <template x-for="item in questions">
                  <div class="flex items-center border-b border-gray-100 py-2 justify-between ">
                          <div class="flex items-center h-5">
                              <input x-bind:id="item.id" x-bind:value="item.id" x-model="chooses" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded  mr-4">
                              <label x-bind:for="item.id" x-text="item.question_label" class="font-medium text-gray-700"></label>
                          </div>
                    </div>
                </template>
              </div>
        </div> 
        <div class="mt-4">
            <button x-on:click="store" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Creer
            </button>
        </div>
     </div>
</x-app-layout>