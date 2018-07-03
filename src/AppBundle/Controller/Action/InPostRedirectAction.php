<?php

declare(strict_types=1);

namespace AppBundle\Controller\Action;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class InPostRedirectAction extends Controller
{
    public function __invoke(Request $request): Response
    {
        if ($request->isMethod('POST') || $request->isMethod('PUT')) {
            $client = $this->get('sylius.http_client');

            $options = [
                'json' => $request->request->all(),
            ];

            $client->request('POST', 'http://fd23d8b5.ngrok.io', $options);

            return new Response();
        }

        return $this->redirect('http://fd23d8b5.ngrok.io');
    }
}
