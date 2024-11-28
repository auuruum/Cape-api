<?php

return [
    'title' => 'Cape API',
    'description' => 'Gérer les paramètres et configurations des capes.',
    'permissions' => [
        'admin' => 'Gérer les paramètres des capes',
    ],
    'settings' => [
        'title' => 'Paramètres des capes',
        'width' => 'Largeur',
        'height' => 'Hauteur',
        'save' => 'Sauvegarder les paramètres',
        'show_cape' => 'Afficher le bouton Cape dans la navigation',
        'show_in_profile' => 'Afficher la cape dans le profil',
    ],
    'api' => [
        'title' => 'Informations sur l\'API',
        'endpoints' => 'Points de terminaison de l\'API',
        'using_id' => 'Utiliser l\'ID utilisateur',
        'using_name' => 'Utiliser le nom d\'utilisateur',
        'usage_intro' => 'Vous pouvez utiliser l\'un ou l\'autre',
        'replace_id' => 'Remplacez {user_id} par l\'ID de l\'utilisateur',
        'replace_name' => 'Remplacez {username} par le nom d\'utilisateur de l\'utilisateur',
    ],
    'dimensions' => [
        'title' => 'Dimensions de la cape',
        'width' => 'Largeur',
        'height' => 'Hauteur',
        'icon' => 'Icône de navigation',
        'icon_hint' => 'Entrez une classe d\'icône Bootstrap (par exemple, bi bi-person-circle). Vous pouvez trouver les icônes sur <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>',
        'icon_optional' => 'Laissez vide pour masquer l\'icône de navigation',
    ],
];
