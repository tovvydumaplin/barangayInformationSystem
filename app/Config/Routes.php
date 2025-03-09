<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// Login
$routes->get('/', 'AuthController::login');
// Admin 
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/community-records', 'AdminController::communityRecords');
$routes->get('admin/lending-assets', 'AdminController::lendingAssets');
$routes->get('admin/events', 'AdminController::events');
$routes->get('admin/services','AdminController::services');
$routes->get('admin/officials','AdminController::officials');
$routes->get('admin/incident-reports', 'AdminController::incidentReports');
$routes->get('admin/manage-users', 'AdminController::manageUsers');
$routes->get('admin/account-settings', 'AdminController::accountSettings');