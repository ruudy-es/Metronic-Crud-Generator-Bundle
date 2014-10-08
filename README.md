# METRONIC CRUD GENERATOR BUNDLE

I apologize for the inconvenience that my english can produce.

Thanks to Sonata Project, their code inspire me on how to do some things.

Thanks to Metronic - Responsive Admin Dashboard Template creators for the good treatment received.

License
=======

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

Instalation
===========

Installation is a quick 4 step process:

1. Download over composer
2. Enable the bundle
3. Generate the required files for the bundle

Step 1. Download over composer
------------------------------

Add RuudyMetronicCrudGeneratorBundle require line to your composer.json:

    "require": {
        "ruudy/metronic-crud-generator-bundle": "@dev"
    }

    $ php composer.phar install

or just add it by running the command:

    $ php composer.phar require ruudy/metronic-crud-generator-bundle '@dev'

Composer will install the bundle to your project's ruudy/metronic-crud-generator-bundle directory.

Step 2. Enable the bundle
-------------------------

Enable the bundle in the kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Ruudy\MetronicCrudGeneratorBundle\RuudyMetronicCrudGeneratorBundle(),
        );
    }

Step 3. Generate the required files for the bundle
--------------------------------------------------

At this point, the bundle is not yet ready. You need to generate the correct files and folders for the twig inherance:

    $ php app/console ruudy:metronic:generate

This command will generate and skeleton bundle on src/Application/Ruudy/, and some folders to populate with the Metronic Template Assets.

After this, add new bundle to kernel:

    <?php
        // app/AppKernel.php

        public function registerBundles()
        {
            $bundles = array(
                // ...
                new Application\Ruudy\MetronicBackEndBundle\ApplicationMetronicBackEndBundle(),
            );
        }

Usage
=====

This bundle comes with basic layout template based on Metronic Bundle, its allow you to start generating cruds of your entities without create any twig.
 
I strongly recommend you 



php app/console ruudy:metronic-crud-generator:generate

After installation


Explicar como extenderlo