<?php

namespace AppAdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'EasyAdminBundle';
    }
}