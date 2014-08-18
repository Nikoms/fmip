fmip
====

PageBundle &amp; SiteBundle

Create DB
===
php app/console doctrine:schema:create

Install fixtures:
===
php app/console doctrine:fixtures:load


Config
===

By default, the page provider IS the repository (Doctrine ORM). However, you can change it to another service id.
This service must extend *Nmc\DynamicPageBundle\Entity\PageProviderInterface*. There is already a provider that is compatible with the DynamicWebsiteBundle: nmc_dynamic_page.page_of_web_provider.

nmc_dynamic_page:
    provider_service_id: nmc_dynamic_page.page_of_web_provider #if you use DynamicWebsiteBundle