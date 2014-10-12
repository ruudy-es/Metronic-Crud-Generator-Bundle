# METRONIC CRUD GENERATOR BUNDLE

This bundle extends the symfony2 crud generator and 

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

*. Configure Metronic Bundle (Optional)
1. Download over composer
2. Enable the bundle
3. Generate the required files for the bundle

* Configure Metronic Bundle (Optional)
--------------------------------------

This package have dependencie of [**Ruudy - MetronicBundle**][1]

If you didn't follow the Metronic Bundle installation steps you must stop reading this readme and first of all, install and configure that bundle.
 
[**Ruudy - MetronicBundle Readme**][2]

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

Configuration (optional)
========================

If you are familiar with the Doctrine Crud Generator you know that the skeleton for the crud can be stored on many paths in you application, if not, i recommend you read the official documentation:

[**Symfony2 - Overriding Skeleton Templates**][3]

By default, this bundle comes with 3 paths to recognize the skeleton needed for generating the crud files.

    $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@RuudyMetronicCrudGeneratorBundle/Resources/skeleton');
    $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@RuudyMetronicCrudGeneratorBundle/Resources');
    $skeletonDirs[] = $this->getContainer()->get('kernel')->locateResource('@RuudyMetronicBundle/Resources');
    
The order you add the locations is important becuase it define the preference when Generator search required files, so this bundle allow you to override or add locations:

        // app/config/config.yml
        
        // ...
        ruudy_metronic_crud_generator:
            override_resource_locations: []
            add_resource_locations_ []
            
Locations you add on override will be included before default bundle Dirs, locations you add, after.CrudCommand.php
                                                                                                    GenerateCommand.php

Usage
=====

// TODO explain dependencie on metronic and how to generate Aplication bundle or link it

After the installation you have 2 options:

1. Extend the bundle with your own Company/StoreBundle (take care that you need the views
2. Use the bundle generated in src/Application/Ruudy

Now just have to generate your Entities and This

This bundle comes with basic layout template based on Metronic Bundle, you can extend it



php app/console doctrine:generate:entity




After installation


Explicar como extenderlo


[1]: https://github.com/ruudy-es/Metronic-Bundle
[2]: https://github.com/ruudy-es/Metronic-Bundle/blob/master/README.md
[3]: http://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html#overriding-skeleton-templates
