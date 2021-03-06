<?php

declare(strict_types=1);

namespace AppBundle\Controller\Action;

use GuzzleHttp\Client;
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


            $options = [
                'json' => $request->request->all(),
            ];

            $this->client->request('POST', 'https://fecdee95.ngrok.io/shipping/inpost/notify', $options);
        } catch (\Exception $exception) {

        }

        try {
            $optionsStaging = [
                'json' => $request->request->all(),
                'auth' => [
                    'admin',
                    'Testarossa64'
                ],
            ];

            $this->client->request('POST', 'http://staging-5em2ouy-tpalwpvubbdjg.eu.platform.sh/shipping/inpost/notify', $optionsStaging);
        } catch (\Exception $exception) {

        }

        return new Response('OK');
    }
}
