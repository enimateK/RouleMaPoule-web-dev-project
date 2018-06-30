<?php

namespace IHM\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IHMUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
