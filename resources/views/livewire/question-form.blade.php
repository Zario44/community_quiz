<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
            
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $questionId ? __('quiz.form.title_edit') : __('quiz.form.title_add') }} 
                </h2>
                <p class="text-gray-600">{{ __('quiz.form.subtitle') }}</p>
            </div>

            <form wire:submit.prevent="saveQuestion" class="space-y-6">
                
                <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                    <label class="block text-sm font-semibold text-indigo-900">{{ __('quiz.form.labels.tag') }} </label>
                    <input type="text" wire:model="form.tag" placeholder="{{ __('quiz.form.placeholders.tag') }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('form.tag') <span class="text-red-500 text-xs">{{ __('quiz.errors.no_tag') }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">{{ __('quiz.form.labels.question') }}</label>
                    <textarea rows="3" wire:model="form.question_text" placeholder="{{ __('quiz.form.placeholders.question') }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    @error('form.question_text') <span class="text-red-500 text-xs">{{ __('quiz.errors.no_question') }}</span> @enderror
                </div>

                <div class="space-y-4">
                    <label class="block text-sm font-semibold text-gray-700">{{ __('quiz.form.labels.answers') }}</label>
                    
                    @foreach(['A', 'B', 'C', 'D'] as $index => $option)
                    <div class="flex items-center space-x-3 p-3 border rounded-lg hover:bg-gray-50 transition {{ $form->correct_answer == $index ? 'border-green-500 bg-green-50' : 'border-gray-200' }}">
                        
                        <input type="radio" wire:model="form.correct_answer" name="correct_answer" value="{{ $index }}"
                            class="h-5 w-5 text-green-600 border-gray-300 focus:ring-green-500 cursor-pointer">
                        
                        <span class="font-bold text-gray-400">{{ $option }}.</span>
                        
                        <input type="text" wire:model="form.answers.{{ $index }}" placeholder="{{ __('quiz.form.placeholders.answer') }}"
                            class="flex-1 border-none focus:ring-0 p-0 text-gray-700 bg-transparent">
                    </div>
                    @endforeach

                    @error('form.correct_answer') <span class="text-red-500 text-xs">{{ __('quiz.errors.no_correct_answer') }}</span> @enderror
                    @error('form.answers.*') <span class="text-red-500 text-xs">{{ __('quiz.errors.no_full_answers') }}</span> @enderror
                </div>

                <div class="pt-6 border-t">
                    <button type="submit" 
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-not-allowed"
                        class="w-full py-4 px-6 rounded-xl font-bold shadow-md transition-all duration-200 text-black bg-gray-200 hover:bg-gray-800 hover:text-white active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">

                        <span wire:loading.remove>
                            {{ $questionId ? __('quiz.buttons.update') : __('quiz.buttons.save') }}
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