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
        return $this->redirect('http://fd23d8b5.ngrok.io');
    }
}
