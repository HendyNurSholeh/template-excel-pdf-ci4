<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/export-excel', 'Home::exportExcel');
$routes->get('/export-pdf', 'Home::exportPdf');