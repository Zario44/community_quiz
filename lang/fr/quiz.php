<?php

return [
    // On peut organiser par "sections" pour s'y retrouver
    'form' => [
        'title_add' => 'Ajouter une question',
        'title_edit' => 'Modifier la question',
        'subtitle' => 'Configurez votre question et définissez la bonne réponse.',
        
        'labels' => [
            'tag' => 'Thème / Tag',
            'question' => 'Votre Question',
            'answers' => 'Réponses possibles (Cochez la bonne)',
        ],

        'placeholders' => [
            'tag' => 'Ex: Histoire, Cinéma...',
            'question' => 'Quelle est la capitale de...',
            'answer' => 'Saisissez la réponse...',
        ],
    ],

    'buttons' => [
        'save' => 'Enregistrer la nouvelle question',
        'update' => 'Mettre à jour la question',
        'cancel' => 'Annuler et retourner à la liste',
    ],

    'errors' => [
        'no_tag' => 'Le thème est obligatoire.',
        'no_question' => 'La question est obligatoire.',
        'no_correct_answer' => 'Veuillez sélectionner la bonne réponse.',
        'no_full_answers' => 'Toutes les réponses doivent être remplies.',
    ],

    'messages' => [
        'success_created' => 'La question a été créée avec succès !',
        'success_updated' => 'La question a été modifiée.',
    ],
];