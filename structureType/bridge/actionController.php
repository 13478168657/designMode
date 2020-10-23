<?php

namespace bridge;

include_once 'Page.php';

include_once 'ProductPage.php';
include_once 'SimplePage.php';
include_once 'HTMLRenderer.php';
include_once 'JsonRenderer.php';
include_once 'Product.php';
class actionController{


    public function index(Page $page){

        echo $page->view();

    }
}
$action = new actionController();



/**
 * The client code can be executed with any pre-configured combination of the
 * Abstraction+Implementation.
 */
$HTMLRenderer = new HTMLRenderer();
$JSONRenderer = new JsonRenderer();

$page = new SimplePage($HTMLRenderer, "Home", "Welcome to our website!");
echo "HTML view of a simple content page:\n";
$action->index($page);
echo "\n\n";

/**
 * The Abstraction can change the linked Implementation at runtime if needed.
 */
$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, rendered with the same client code:\n";
$action->index($page);
echo "\n\n";


$product = new Product("123", "Star Wars, episode1",
    "A long time ago in a galaxy far, far away...",
    "/images/star-wars.jpeg", 39.95);

$page = new ProductPage($HTMLRenderer, $product);
echo "HTML view of a product page, same client code:\n";
$action->index($page);
echo "\n\n";

$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, with the same client code:\n";
$action->index($page);