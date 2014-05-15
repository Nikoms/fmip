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
use Nmc\DynamicPageBundle\Entity\Website;

class LoadWebsiteData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $website = new Website();
        $website->setHost('fmip.git');
        $website->setTitle('Le site de fmip et de fmoup');

        $manager->persist($website);


        $website = new Website();
        $website->setHost('papa.git');
        $website->setTitle('Le site de paps');

        $manager->persist($website);


        $manager->flush();
    }
} 