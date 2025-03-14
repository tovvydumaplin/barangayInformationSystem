<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth Routes
$routes->get('/', 'AuthController::login');
$routes->post('/auth/processLogin', 'AuthController::processLogin');
$routes->get('/auth/logout', 'AuthController::logout');

// Protect Admin Routes with Auth Filter
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('community-records', 'AdminController::communityRecords');
    $routes->get('lending-assets', 'AdminController::lendingAssets');
    $routes->get('events', 'AdminController::events');
    $routes->get('services', 'AdminController::services');
    $routes->get('officials', 'AdminController::officials');
    $routes->get('incident-reports', 'AdminController::incidentReports');
    $routes->get('manage-users', 'AdminController::manageUsers');
    $routes->get('account-settings', 'AdminController::accountSettings');
});
