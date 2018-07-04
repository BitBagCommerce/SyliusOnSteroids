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
//        if ($request->isMethod('POST') || $request->isMethod('PUT')) {
//
//            $options = [
//                'json' => $request->request->all(),
//            ];
//
//            $this->client->request('POST', 'http://fd23d8b5.ngrok.io', $options);
//
//            return new Response();
//        }

        return new Response('OK');
    }
}
