<?php

return [
    'title' => 'Cape',
    'description' => 'Manage your Minecraft cape',
    
    'profile' => [
        'title' => 'Cape Management',
        'current' => 'Current Cape',
        'upload' => [
            'title' => 'Upload Cape',
            'submit' => 'Upload',
            'requirements' => 'The cape must be a PNG image with dimensions :width x :height pixels.',
            'success' => 'Your cape has been updated successfully!',
            'error' => 'An error occurred while uploading your cape.',
            'invalid' => 'The uploaded file is not a valid PNG image.',
            'dimensions' => 'The cape must be exactly :width x :height pixels.',
        ],
        'delete' => [
            'title' => 'Remove Cape',
            'submit' => 'Remove',
            'success' => 'Your cape has been removed successfully!',
            'error' => 'An error occurred while removing your cape.',
        ],
    ],
    
    'home' => [
        'features' => 'Features',
        'links' => 'Quick Links',
    ],
];