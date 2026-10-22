<?php

// this file contains the service providers registration for the
// SigmaPHP framework.

return [
    /**
     * Core Service Providers.
     */
    \SigmaPHP\Core\Providers\ConfigServiceProvider::class,
    \SigmaPHP\Core\Providers\RouterServiceProvider::class,
    \SigmaPHP\Core\Providers\ViewServiceProvider::class,
    \SigmaPHP\Core\Providers\DBServiceProvider::class,
    \SigmaPHP\Core\Providers\HTTPServiceProvider::class,
    \SigmaPHP\Core\Providers\FilesystemServiceProvider::class,

    /**
     * User Defined Service Providers.
     */
];
