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

1. Configure Metronic Bundle (if Needed)
2. Download over composer
3. Enable the bundle
4. Generate the required files for the bundle
5. Extending & Configurating it (optional)

Step 1. Configure Metronic Bundle (if Needed)
---------------------------------------------

This package have dependencie of [**Ruudy - MetronicBundle**][1]

If you didn't follow the Metronic Bundle installation steps you must stop reading this readme and first of all, install and configure that bundle.
 
[**Ruudy - MetronicBundle Readme**][2]

Step 2. Download over composer
------------------------------

Add RuudyMetronicCrudGeneratorBundle require line to your composer.json:

    "require": {
        "ruudy/metronic-crud-generator-bundle": "@dev"
    }

    $ php composer.phar install

or just add it by running the command:

    $ php composer.phar require ruudy/metronic-crud-generator-bundle '@dev'

Composer will install the bundle to your project's ruudy/metronic-crud-generator-bundle directory.

Step 3. Enable the bundle
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

Step 4. Generate the required files for the bundle
--------------------------------------------------

At this point, the bundle is not yet ready and you must choose between use default basic views provided in this bundle, or create your own. I recommend test this bundle with default view, but if you want create your layouts from scratch, you can go directly to Step 5.

You need to generate the correct files and folders for the twig inherance:

    $ php app/console ruudy:metronic-crud-generator:generate

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

Step 5. Extending & Configurating it (optional)
===============================================

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
            
Locations defined on override will be included before default bundle Dirs, locations you add, after.

This functionality allow you to modify the basic layout i propose or just create new one.

Usage
=====

After installation you can just use the bundle generated in:

    src/Application/Ruudy

1. Extend the bundle with your own Company/StoreBundle (take care of the views you need)
2. Use the bundle generated in src/Application/Ruudy

Entity class is needed in the process, so create one if you dont have it:

    $ php app/console generate:doctrine:entity
    
Or just run and follow the steps:

    $ php app/console ruudy:metronic-crud-generator:crud
    
Command will create necessary Controllers, form types, views and tests.

Common Errors $ Doubts
======================

-- Dont forget to add the annotation route in one of your routng files, in this example i use yml, so in one of my "routing.yml" loaded.

    cruds:
      resource: "@CompanyStoreBundle/Controller/"
      type: annotation
      prefix: /admin

-- I suppose you will use this bundle in an private admin enviroment, for avoid errors i added this check:

    // src/Application/Ruudy/MetronicBackEndBundle/Resources/views/zones/admin/header.html.twig
    
    {% if app.user.username is defined %}
        {{ app.user.username }}
    {% endif %}
    
-- Like previous point, logout path is normally in all backoffice applications:

    An exception has been thrown during the rendering of a template ("Unable to generate a URL for the named route "logout" as such route does not exist.")
    
   Can be easy bypass adding:
   
    logout:
        path: /logout

-- Dont forget to follow Metronic Bundle installation steps or you will see non styled pages.

[1]: https://github.com/ruudy-es/Metronic-Bundle
[2]: https://github.com/ruudy-es/Metronic-Bundle/blob/master/README.md
[3]: http://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html#overriding-skeleton-templates
