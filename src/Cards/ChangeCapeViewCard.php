<?php

namespace Azuriom\Plugin\CapeApi\Cards;

use Azuriom\Extensions\Plugin\UserProfileCardComposer;

class ChangeCapeViewCard extends UserProfileCardComposer
{
    public function getCards(): array
    {
        return [
            [
                'name' => trans('cape-api::messages.profile.title'),
                'view' => 'cape-api::cards.changecape',
            ],
        ];
    }
}
