<?php
/**
 * Created by PhpStorm.
 * User: dabad
 * Date: 7/18/14
 * Time: 8:56 AM
 */

namespace Ruudy\MetronicCrudsGeneratorBundle\Command;

use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

class CrudCommand extends GenerateDoctrineCrudCommand
{
    protected $generator;

    protected function configure()
    {
        parent::configure();

        $this->setName('ruudy:generate:crud');
        $this->setDescription('Ruudy automatic crud generator based on metronic templates!');
    }

    protected function getSkeletonDirs(BundleInterface $bundle = null)
    {
        $skeletonDirs = array();

        if (isset($bundle) && is_dir($dir = $bundle->getPath().'/Resources/SensioGeneratorBundle/skeleton')) {
            $skeletonDirs[] = $dir;
        }

        if (is_dir($dir = $this->getContainer()->get('kernel')->getRootdir().'/Resources/SensioGeneratorBundle/skeleton')) {
            $skeletonDirs[] = $dir;
        }

        $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@RuudyMetronicCrudsGeneratorBundle/Resources/skeleton');
        $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@RuudyMetronicCrudsGeneratorBundle/Resources');
        $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@RuudyMetronicBundle/Resources');

        return $skeletonDirs;
    }
} 