<x-layouts.app :title="__('Dashboard')">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-center mb-8 text-3xl font-extrabold text-indigo-600 tracking-tight">
                🏆 Tableau des Leaders
            </h1>

            {{-- La carte (Card) --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                
                <div class="bg-indigo-600 py-4 px-6 text-center">
                    <h4 class="text-lg font-bold text-white uppercase tracking-wider">
                        Top 10 Meilleurs Scores
                    </h4>
                </div>
                <div class="p-0 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-20">
                                    Rang
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Joueur
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Score
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($bestScores as $score)
                                {{-- Ligne du tableau : Jaune pâle pour le 1er --}}
                                <tr class="hover:bg-gray-200 transition-colors duration-150 {{ $loop->first ? 'bg-yellow-50' : '' }} {{ !($loop->iteration % 2) ? 'bg-gray-100' : 'bg-white' }}">
                                    
                                    {{-- 1. Rang --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-lg font-bold text-indigo-600">
                                        @if ($loop->iteration == 1)
                                            <span class="text-2xl drop-shadow-sm">🥇</span>
                                        @elseif ($loop->iteration == 2)
                                            <span class="text-2xl drop-shadow-sm">🥈</span>
                                        @elseif ($loop->iteration == 3)
                                            <span class="text-2xl drop-shadow-sm">🥉</span>
                                        @else
                                            <span class="text-gray-400">#{{ $loop->iteration }}</span>
                                        @endif
                                    </td>

                                    {{-- 2. Joueur --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-semibold text-gray-900">
                                                {{ $score->name }}
                                            </div>
                                        </div>
                                    </td>

                                    {{-- 3. Score --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold text-green-600">
                                        {{ number_format($score->score, 0, ',', ' ') }} pts
                                    </td>
                                </tr>
                            @empty
                                {{-- Cas vide --}}
                                <tr>
                                    <td colspan="3" class="px-6 py-10 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span class="text-lg font-medium">Aucun score enregistré.</span>
                                            <span class="text-sm">Soyez le premier à jouer !</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-50 px-6 py-4 text-center border-t border-gray-100">
                    <a href="{{ route('quiz') }}" class="inline-flex items-center px-8 py-3 bg-indigo-600 border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        🎮 Jouer maintenant !
                    </a>
                </div>
            </div>
            <p class="mt-6 text-center text-sm text-gray-500">
                Classement mis à jour toutes les 5 minutes.
            </p>

        </div>
    </div>

</x-layouts.app>
