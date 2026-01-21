<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
            
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">
                    Soumettre une erreur dans la question "{{ $question->question_text }}"
                </h2>
            </div>

            <form wire:submit.prevent="saveQuestion" class="space-y-6">
                <div class="p-1 rounded-lg ">
                    <label class="block text-sm font-semibold">Objet </label>
                    <input type="text" wire:model="form.tag" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('form.tag') <span class="text-red-500 text-xs">{{ __('quiz.errors.no_tag') }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Description de l'erreur</label>
                    <textarea rows="3" wire:model="form.question_text" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    @error('form.question_text') <span class="text-red-500 text-xs">{{ __('quiz.errors.no_question') }}</span> @enderror
                </div>

                <div class="pt-6 border-t">
                    <button type="submit" 
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-not-allowed"
                        class="w-full py-4 px-6 rounded-xl font-bold shadow-md transition-all duration-200 text-black bg-gray-200 hover:bg-red-400 hover:text-white active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">

                        <span wire:loading.remove>
                            Soumettre l'erreur
                        </span>

                        <span wire:loading class="flex items-center justify-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Traitement...</span>
                        </span>

                    </button>
                    
                    <a href="{{ route('user.questions') }}" class="block text-center mt-4 text-sm text-gray-500 hover:underline cursor-pointer">
                        {{ __('quiz.buttons.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>