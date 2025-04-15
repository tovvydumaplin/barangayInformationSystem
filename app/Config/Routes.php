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
// Reactivate Event
$routes->post('/admin/reactivate-event', 'AdminController::reactivateEvent');
// Approve Event
$routes->post('/admin/approve-event', 'AdminController::approveEvent');
// Disapprove Event
$routes->post('/admin/disapprove-event', 'AdminController::disapproveEvent');

// Create Resident
$routes->post('/admin/create-resident','AdminController::createResident');
// View all residents
$routes->get('admin/get-residents', 'AdminController::loadResidents');
$routes->get('admin/filter-residents', 'AdminController::filterResidents');
// Update residents
$routes->post('/admin/update-resident', 'AdminController::updateResident');
// View resident
$routes->get('admin/get-resident-details','AdminController::getResidentDetails');
// View archived residents
$routes->get('/admin/get-archived-residents', 'AdminController::getArchivedResidents');
// Archive resident
$routes->post('admin/archive-resident', 'AdminController::archiveResident');
// Reactivate resident
$routes->post('admin/reactivate-resident', 'AdminController::reactivateResident');


// Create pin location
$routes->post('admin/create-pin','AdminController::createPin');
// Display pins
$routes->get('admin/get-house-details', 'AdminController::getHouseDetails');
// Get house numbers
$routes->get('/admin/get-house-numbers','AdminController::getHouseNumbers');
// Get House Street 
$routes->get('admin/get-house-street','AdminController::getHouseStreet');
// Remove resident from house
$routes->post('admin/remove-resident-in-house','AdminController::removeResidentInHouse');
// Update pin location
$routes->post('admin/update-house-location','AdminController::updateHouseLocation');

// Lending Items
$routes->post('admin/create-item', 'AdminController::createItem');
$routes->get('admin/inventory-data', 'AdminController::getInventoryData');
$routes->get('admin/get-item-details', 'AdminController::getItemDetails');
$routes->post('admin/update-item', 'AdminController::updateItem');

$routes->get('admin/lend-items', 'AdminController::lendItems');
$routes->get('admin/fetch-residents', 'AdminController::fetchResidents');
$routes->get('admin/fetch-items', 'AdminController::fetchItems');
// lending
$routes->post('admin/new-lending', 'AdminController::newLending');

$routes->post('admin/view-lent-items', 'AdminController::fetchLendItemDetails');
$routes->post('/admin/update-lending-status', 'AdminController::updateLendingStatus');
// Officials
$routes->post('admin/create-official', 'AdminController::createOfficial');
$routes->get('admin/load-officials', 'AdminController::loadOfficials');
$routes->get('admin/get-official', 'AdminController::getOfficial');
$routes->post('admin/update-official', 'AdminController::updateOfficial');
$routes->get('admin/get-officials', 'AdminController::getOfficials');

// Compaints
$routes->post('admin/create-complaint', 'AdminController::createComplaint');
$routes->get('admin/residents-list', 'AdminController::residentsList');
$routes->get('admin/get-complaints', 'AdminController::getComplaints');
$routes->get('admin/view-complain/(:num)', 'AdminController::viewComplaint/$1');
$routes->post('admin/mark-as-solved', 'AdminController::markAsSolved');

// User account
$routes->post('admin/update-user-image', 'AdminController::updateUserImage');
$routes->post('admin/delete-user-image', 'AdminController::deleteUserImage');
$routes->post('admin/update-user-information', 'AdminController::updateUserInformation');
$routes->post('admin/update-password', 'AdminController::updatePassword');

// Dashboard
$routes->get('admin/count-house-status', 'AdminController::countHouseWithStatus');
$routes->get('admin/count-residents', 'AdminController::countResidents');
$routes->get('admin/count-completed-complaints', 'AdminController::countCompletedComplaints');
$routes->get('admin/count-pending-complaints', 'AdminController::countPendingComplaints');
$routes->get('admin/get-resident-stats', 'AdminController::getResidentStats');
$routes->get('admin/get-events-dashboard', 'AdminController::getEventsDashboard');
$routes->get('admin/get-new-users', 'AdminController::getNewUsers');

