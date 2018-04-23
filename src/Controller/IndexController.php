<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function __invoke()
    {
        return new Response(
            '<html><body>Index</body></html>'
        );
    }
}
