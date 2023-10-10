<?php

// src/Controller/HomeController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;

class HomeController extends AbstractController {

    private $requestStack;

    public function __construct(RequestStack $requestStack) {
        $this->requestStack = $requestStack;
    }

    #[Route('/')]
    public function indexAction(): Response {
        $session = $this->requestStack->getSession();

        $mysession = "Mi Sesión";

        // stores an attribute in the session for later reuse
        if ($this->getUser() && $this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $nombre_usuario = $this->getUser()->getUserIdentifier();
            $session->set('usuario', $nombre_usuario);
        } else {
            $nombre_usuario = 'guest';
        }


        $session->set('usuario', $nombre_usuario);

        // gets an attribute by name
        $webuser = $session->get('usuario');
        $mysession = $webuser;
        return $this->render('index.html.twig', [
                    'mysession' => $mysession,
        ]);
    }

}

?>