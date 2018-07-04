<?php

declare(strict_types=1);

namespace AppBundle\Controller\Action;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class InPostRedirectAction
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(Request $request): Response
    {
        try {
            $this->client->request('POST', 'https://befe0e25.ngrok.io');
        } catch (\Exception $exception) {

        }

        return new Response('OK');
    }
}
