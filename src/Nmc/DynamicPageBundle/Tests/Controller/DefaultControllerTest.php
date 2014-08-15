<?php

namespace Nmc\DynamicPageBundle\Tests\Controller;


use Liip\FunctionalTestBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function setUp()
    {
        $classes = array(
            'Nmc\DynamicPageBundle\DataFixtures\ORM\LoadWebsiteData',
        );
        $this->loadFixtures($classes);
    }
    public function testIndex()
    {
        $client = static::createClient(array(),array('HTTP_HOST' => 'fmip.git'));

        $crawler = $client->request('GET', '/fr/ca');
        $this->assertTrue($crawler->filter('html:contains("Félicitations, ca fonctionne pas trop mal: Ke!")')->count() > 0);
    }
}
