<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 15/05/14
 * Time: 18:55
 */

namespace Nmc\DynamicPageBundle\ORM\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
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
        $page->setLocale('fr');
        $page->setPath('/fr/ca');
        $page->setName('Ke');
        $page->setSort(1);
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
    }
} 