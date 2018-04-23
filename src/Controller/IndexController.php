<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function __invoke()
    {
        return new Response(
            '<html>
                <body>
                <h1>Snap.hr PHP Test</h1>
                <h2>API Calls</h2>
                <ul>
                    <li>curl -X POST  \'{"amount": 1234}\' -v http://localhost:8000/savings</li>
                    <li>curl http://localhost:8000/savings/total</li>
                    <li>curl http://localhost:8000/savings/history</li>
                </ul>
                </body>
            </html>
            '
        );
    }
}
