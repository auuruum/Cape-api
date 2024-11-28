<?php

return [
    'title' => 'Cape API',
    'description' => 'Управление настройками и конфигурацией плащей.',
    'permissions' => [
        'admin' => 'Управление настройками плащей',
    ],
    'settings' => [
        'title' => 'Настройки плащей',
        'width' => 'Ширина плаща',
        'height' => 'Высота плаща',
        'save' => 'Сохранить настройки',
        'show_cape' => 'Показывать кнопку плаща в навигации',
    ],
    'api' => [
        'title' => 'Информация об API',
        'endpoints' => 'Конечные точки API',
        'using_id' => 'Использование ID пользователя',
        'using_name' => 'Использование имени пользователя',
        'usage_intro' => 'Вы можете использовать',
        'replace_id' => 'Замените {user_id} на ID номер пользователя',
        'replace_name' => 'Замените {username} на имя пользователя',
    ],
    'dimensions' => [
        'title' => 'Размеры плаща',
        'width' => 'Ширина',
        'height' => 'Высота',
        'icon' => 'Иконка навигации',
        'icon_hint' => 'Введите класс иконки Bootstrap (например, bi bi-person-circle). Вы можете найти иконки на <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>',
        'icon_optional' => 'Оставьте пустым, чтобы скрыть иконку навигации',
    ],
];