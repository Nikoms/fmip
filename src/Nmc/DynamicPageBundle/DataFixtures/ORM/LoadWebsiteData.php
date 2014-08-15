<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 15/05/14
 * Time: 18:55
 */

namespace Nmc\DynamicPageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nmc\DynamicPageBundle\Entity\Block;
use Nmc\DynamicPageBundle\Entity\Page;
use Nmc\DynamicPageBundle\Entity\Website;

class LoadWebsiteData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $this->addSite1($manager);
        $this->addSite2($manager);
        $this->addNoSite($manager);
        $manager->flush();
    }

    private function addSite1(ObjectManager $manager)
    {
        $website = new Website();
        $website->setHost('fmip.git');
        $website->setTitle('Le site de fmip');

        $manager->persist($website);


        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('');
        $page->setPath('/');
        $page->setName('ACCUEIL');
        $page->setSort(0);
        $manager->persist($page);

        $block = new Block();
        $block->setName('Test Rss');
        $block->setPage($page);
        $block->setType('sonata.block.service.rss');
        $block->setSettings(
            array(
                'title' => 'Sonata feed',
                'url' => 'http://sonata-project.org/blog/archive.rss',
            )
        );
        $manager->persist($block);

        $block = new Block();
        $block->setName('Test TextBlockService');
        $block->setPage($page);
        $block->setType('sonata.block.service.text');
        $block->setSettings(
            array(
                'content' => 'Bonjour madame :)',
            )
        );
        $manager->persist($block);


        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('fr');
        $page->setPath('/fr/ca');
        $page->setName('Ke');
        $page->setSort(1);
        $page->setTemplate('NmcDynamicPageBundle:Default:index2.html.twig');
        $manager->persist($page);

        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('fr');
        $page->setPath('/fr/fonctionne');
        $page->setName("Ftem!");
        $page->setSort(2);
        $manager->persist($page);


        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('en');
        $page->setPath('/en/it');
        $page->setName('Yeah');
        $page->setSort(1);
        $manager->persist($page);

        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('en');
        $page->setPath('/en/works');
        $page->setName("Baby!");
        $page->setSort(2);
        $manager->persist($page);
    }

    private function addSite2(ObjectManager $manager)
    {
        $website = new Website();
        $website->setHost('papa.git');
        $website->setTitle('Le site de paps');

        $manager->persist($website);

        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('fr');
        $page->setPath('/fr/ou');
        $page->setName('La');
        $page->setSort(1);
        $manager->persist($page);

        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('fr');
        $page->setPath('/fr/tai');
        $page->setName("Bas!");
        $page->setSort(2);
        $manager->persist($page);


        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('en');
        $page->setPath('/en/wer');
        $page->setName('I am');
        $page->setSort(1);
        $manager->persist($page);

        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('en');
        $page->setPath('/en/aryou');
        $page->setName("Herefk!");
        $page->setSort(2);
        $manager->persist($page);
    }

    private function addNoSite(ObjectManager $manager)
    {
        $website = new Website();
        $website->setHost('no-website');
        $website->setTitle('No website :(');
        $manager->persist($website);

        $page = new Page();
        $page->setWebsite($website);
        $page->setLocale('');
        $page->setPath('/');
        $page->setName("Accueil général d'un site inconnu!");
        $page->setSort(1);
        $manager->persist($page);
    }
} 