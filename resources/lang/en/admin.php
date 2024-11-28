<?php

return [
    'title' => 'Cape API',
    'description' => 'Manage cape settings and configurations.',
    'permissions' => [
        'admin' => 'Manage cape settings',
    ],
    'settings' => [
        'title' => 'Cape Settings',
        'width' => 'Width',
        'height' => 'Height',
        'save' => 'Save Settings',
        'show_cape' => 'Show Cape button in navigation',
    ],
    'api' => [
        'title' => 'API Information',
        'endpoints' => 'API Endpoints',
        'using_id' => 'Using User ID',
        'using_name' => 'Using Username',
        'usage_intro' => 'You can use either',
        'replace_id' => 'Replace {user_id} with the user\'s ID number',
        'replace_name' => 'Replace {username} with the user\'s username',
    ],
    'dimensions' => [
        'title' => 'Cape Dimensions',
        'width' => 'Width',
        'height' => 'Height',
        'icon' => 'Navigation Icon',
        'icon_hint' => 'Enter a Bootstrap icon class (e.g., bi bi-person-circle). You can find icons at <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>',
        'icon_optional' => 'Leave empty to hide the navigation icon',
    ],
];