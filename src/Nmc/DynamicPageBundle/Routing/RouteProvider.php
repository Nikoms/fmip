<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 12/05/14
 * Time: 21:51
 */

namespace Nmc\DynamicPageBundle\Routing;


use Nmc\DynamicPageBundle\Service\PageFinderInterface;
use Symfony\Cmf\Component\Routing\RouteProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RouteProvider implements RouteProviderInterface{

    /**
     * @var \Nmc\DynamicPageBundle\Service\PageFinderInterface
     */
    private $pageFinder;

    /**
     * @param PageFinderInterface $pageFinder
     */
    public function __construct(PageFinderInterface $pageFinder)
    {
        $this->pageFinder = $pageFinder;
    }
    /**
     * Finds routes that may potentially match the request.
     *
     * This may return a mixed list of class instances, but all routes returned
     * must extend the core symfony route. The classes may also implement
     * RouteObjectInterface to link to a content document.
     *
     * This method may not throw an exception based on implementation specific
     * restrictions on the url. That case is considered a not found - returning
     * an empty array. Exceptions are only used to abort the whole request in
     * case something is seriously broken, like the storage backend being down.
     *
     * Note that implementations may not implement an optimal matching
     * algorithm, simply a reasonable first pass.  That allows for potentially
     * very large route sets to be filtered down to likely candidates, which
     * may then be filtered in memory more completely.
     *
     * @param Request $request A request against which to match.
     *
     * @return RouteCollection with all Routes that could potentially match
     *                         $request. Empty collection if nothing can match.
     */
    public function getRouteCollectionForRequest(Request $request)
    {
        $routes = $this->getRouteCollection();
        $context = new RequestContext();
        $context->fromRequest($request);
        $matcher = new UrlMatcher($routes, $context);
        $attributes = $matcher->matchRequest($request);


        $routeCollection = new RouteCollection();
        $routeCollection->add($attributes['_route'], $routes->get($attributes['_route']));

        return $routeCollection;
    }

    /**
     * @return RouteCollection
     */
    private function getRouteCollection()
    {
        $routeCollection = new RouteCollection();

        foreach($this->pageFinder->getPages() as $page){
            $config = array('page' => $page);
            $routeCollection->add($page->getLocale() . '_' . $page->getId(), new Route($page->getPath(), array('_controller' => 'Nmc\DynamicPageBundle\Controller\DefaultController::pageAction') + $config));
        }

        return $routeCollection;
    }

    /**
     * Find the route using the provided route name.
     *
     * @param string $name The route name to fetch.
     *
     * @return Route
     *
     * @throws RouteNotFoundException If there is no route with that name in
     *                                this repository
     */
    public function getRouteByName($name)
    {
        //This provider doesn't take symfony routes
        if(substr($name,0,1) === '_'){
            throw new RouteNotFoundException();
        }
//        exit('getRouteByName ' . $name);
        // TODO: Implement getRouteByName() method.
    }

    /**
     * Find many routes by their names using the provided list of names.
     *
     * Note that this method may not throw an exception if some of the routes
     * are not found or are not actually Route instances. It will just return the
     * list of those Route instances it found.
     *
     * This method exists in order to allow performance optimizations. The
     * simple implementation could be to just repeatedly call
     * $this->getRouteByName() while catching and ignoring eventual exceptions.
     *
     * If $names is null, this method SHOULD return a collection of all routes
     * known to this provider. If there are many routes to be expected, usage of
     * a lazy loading collection is recommended. A provider MAY only return a
     * subset of routes to e.g. support paging or other concepts, but be aware
     * that the DynamicRouter will only call this method once per
     * DynamicRouter::getRouteCollection() call.
     *
     * @param array|null $names The list of names to retrieve, In case of null,
     *                          the provider will determine what routes to return.
     *
     * @return Route[] Iterable list with the keys being the names from the
     *                     $names array.
     */
    public function getRoutesByNames($names)
    {
        return $this->getRouteCollection();
        // TODO: Implement getRoutesByNames() method.
    }


} 