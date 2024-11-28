<?php

namespace Azuriom\Plugin\CapeApi\Cards;

use Azuriom\Extensions\Plugin\UserProfileCardComposer;

class ChangeCapeViewCard extends UserProfileCardComposer
{
    public function getCards(): array
    {
        // Only show the card if enabled in settings
        if (!setting('cape-api.show_in_profile', true)) {
            return [];
        }

        return [
            [
                'name' => trans('cape-api::messages.profile.title'),
                'view' => 'cape-api::cards.changecape',
            ],
        ];
    }
}
