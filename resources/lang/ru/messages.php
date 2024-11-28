<?php

return [
    'title' => 'Плащ',
    'description' => 'Управление вашим плащом Minecraft',
    
    'profile' => [
        'title' => 'Управление плащом',
        'current' => 'Текущий плащ',
        'upload' => [
            'title' => 'Загрузить плащ',
            'submit' => 'Загрузить',
            'requirements' => 'Плащ должен быть изображением PNG с размерами :width x :height пикселей.',
            'success' => 'Ваш плащ успешно обновлен!',
            'error' => 'При загрузке вашего плаща произошла ошибка.',
            'invalid' => 'Загруженный файл не является допустимым изображением PNG.',
            'dimensions' => 'Плащ должен быть точно :width x :height пикселей.',
        ],
        'delete' => [
            'title' => 'Удалить плащ',
            'submit' => 'Удалить',
            'success' => 'Ваш плащ успешно удален!',
            'error' => 'При удалении вашего плаща произошла ошибка.',
        ],
    ],
    
    'home' => [
        'features' => 'Возможности',
        'links' => 'Быстрые ссылки',
    ],
];