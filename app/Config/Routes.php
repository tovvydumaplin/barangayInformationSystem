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

// Update User
$routes->post('/admin/update-user', 'AdminController::updateUser');
// Deactivate User
$routes->post('/admin/deactivate-user','AdminController::deactivateUser');
// Reactive User
$routes->post('/admin/reactivate-user','AdminController::reactivateUser');
// Retrieval of data to show on tables
$routes->get('/admin/get-users', 'AdminController::getUsers');
// Retrieval of data to show on modal
$routes->get('/admin/get-user', 'AdminController::getUser');
// Create user
$routes->post('admin/create-user', 'AdminController::createUser');
// Create event
$routes->post('admin/create-event','AdminController::createEvent');
// View event
$routes->get('admin/get-events','AdminController::viewEvents');
// View event details 
$routes->get('admin/get-event-details','AdminController::viewEventDetails');
// Update event detailss 
$routes->post('admin/update-event', 'AdminController::updateEventDetails');
// Deactivate Event
$routes->post('/admin/deactivate-event', 'AdminController::deactivateEvent');

// Create Resident
$routes->post('/admin/create-resident','AdminController::createResident');
// View all residents
$routes->get('admin/get-residents', 'AdminController::loadResidents');
// View resident
$routes->get('admin/get-resident-details','AdminController::getResidentDetails');


// Create pin location
$routes->post('admin/create-pin','AdminController::createPin');
// Display pins
$routes->get('admin/get-house-details', 'AdminController::getHouseDetails');
// Get house numbers
$routes->get('/admin/get-house-numbers','AdminController::getHouseNumbers');
