<?php

return [
    'title' => 'Cape',
    'description' => 'Gérer votre cape Minecraft',
    
    'profile' => [
        'title' => 'Gestion de la cape',
        'current' => 'Cape actuelle',
        'upload' => [
            'title' => 'Télécharger la cape',
            'submit' => 'Télécharger',
            'requirements' => 'La cape doit être une image PNG avec des dimensions :width x :height pixels.',
            'success' => 'Votre cape a été mise à jour avec succès !',
            'error' => 'Une erreur est survenue lors du téléchargement de votre cape.',
            'invalid' => 'Le fichier téléchargé n\'est pas une image PNG valide.',
            'dimensions' => 'La cape doit être exactement de :width x :height pixels.',
        ],
        'delete' => [
            'title' => 'Supprimer la cape',
            'submit' => 'Supprimer',
            'success' => 'Votre cape a été supprimée avec succès !',
            'error' => 'Une erreur est survenue lors de la suppression de votre cape.',
        ],
    ],
    
    'home' => [
        'features' => 'Fonctionnalités',
        'links' => 'Liens rapides',
    ],
];
