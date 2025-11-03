<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ForumControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Les Petits Choux🐉');
    }
     public function testPageNotFound(): void
    {
        // On crée un client HTTP simulé (comme un navigateur)
        $client = static::createClient();

        // On teste une URL qui n'existe pas
        $client->request('GET', '/route-qui-existe-pas');

        // ✅ Le site doit répondre 404
        $this->assertResponseStatusCodeSame(404);
    }

    public function testRedirectWhenNotLogged(): void
    {
        // On crée un client HTTP simulé (comme un navigateur)
        $client = static::createClient();

        // On tente d'accéder à une page protégée
        $client->request('GET', '/comment');

        // ✅ On doit être redirigé vers la page login
        $this->assertResponseRedirects('/login');
    }
}
