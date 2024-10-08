<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// CRUD Routes
$routes->get('amortissements-list', 'amortissementsController::index');
$routes->get('amortissement-form', 'amortissementsController::create');
$routes->post('submit-amortissement-form', 'amortissementsController::insertamortissement');
$routes->get('edit-amortissement/(:num)', 'amortissementsController::singleamortissement/$1');
$routes->post('update-amortissement', 'amortissementsController::updateamortissement');
$routes->get('delete-amortissement/(:num)', 'amortissementsController::deleteamortissement/$1');
$routes->get('centres-list', 'centresController::index');
$routes->get('centre-form', 'centresController::create');
$routes->post('submit-centre-form', 'centresController::insertcentre');
$routes->get('edit-centre/(:num)', 'centresController::singlecentre/$1');
$routes->post('update-centre', 'centresController::updatecentre');
$routes->get('delete-centre/(:num)', 'centresController::deletecentre/$1');
$routes->get('charges-list', 'chargesController::index');
$routes->get('charge-form', 'chargesController::create');
$routes->post('submit-charge-form', 'chargesController::insertcharge');
$routes->get('edit-charge/(:num)', 'chargesController::singlecharge/$1');
$routes->post('update-charge', 'chargesController::updatecharge');
$routes->get('delete-charge/(:num)', 'chargesController::deletecharge/$1');
$routes->get('groupes-list', 'groupesController::index');
$routes->get('groupe-form', 'groupesController::create');
$routes->post('submit-groupe-form', 'groupesController::insertgroupe');
$routes->get('edit-groupe/(:num)', 'groupesController::singlegroupe/$1');
$routes->post('update-groupe', 'groupesController::updategroupe');
$routes->get('delete-groupe/(:num)', 'groupesController::deletegroupe/$1');
$routes->get('liaison_charge_centre-list', 'liaison_charge_centreController::index');
$routes->get('liaison_charge_centre-form', 'liaison_charge_centreController::create');
$routes->post('submit-liaison_charge_centre-form', 'liaison_charge_centreController::insertliaison_charge_centre');
$routes->get('edit-liaison_charge_centre/(:num)', 'liaison_charge_centreController::singleliaison_charge_centre/$1');
$routes->post('update-liaison_charge_centre', 'liaison_charge_centreController::updateliaison_charge_centre');
$routes->get('delete-liaison_charge_centre/(:num)', 'liaison_charge_centreController::deleteliaison_charge_centre/$1');
$routes->get('nature_charges-list', 'nature_chargesController::index');
$routes->get('nature_charge-form', 'nature_chargesController::create');
$routes->post('submit-nature_charge-form', 'nature_chargesController::insertnature_charge');
$routes->get('edit-nature_charge/(:num)', 'nature_chargesController::singlenature_charge/$1');
$routes->post('update-nature_charge', 'nature_chargesController::updatenature_charge');
$routes->get('delete-nature_charge/(:num)', 'nature_chargesController::deletenature_charge/$1');
$routes->get('type_charges-list', 'type_chargesController::index');
$routes->get('type_charge-form', 'type_chargesController::create');
$routes->post('submit-type_charge-form', 'type_chargesController::inserttype_charge');
$routes->get('edit-type_charge/(:num)', 'type_chargesController::singletype_charge/$1');
$routes->post('update-type_charge', 'type_chargesController::updatetype_charge');
$routes->get('delete-type_charge/(:num)', 'type_chargesController::deletetype_charge/$1');
$routes->get('unites-list', 'unitesController::index');
$routes->get('unite-form', 'unitesController::create');
$routes->post('submit-unite-form', 'unitesController::insertunite');
$routes->get('edit-unite/(:num)', 'unitesController::singleunite/$1');
$routes->post('update-unite', 'unitesController::updateunite');
$routes->get('delete-unite/(:num)', 'unitesController::deleteunite/$1');


$routes->get('global', 'AnalytiqueController::global');
$routes->get('voir-centre/(:num)', 'AnalytiqueController::global_centre_rubrique/$1');
$routes->get('formulaire_analytique', 'AnalytiqueController::formulaire_analytique');
$routes->post('submit-analytique-form', 'AnalytiqueController::insert_analytique_form');
$routes->get('total_montant_analytique', 'AnalytiqueController::total_montant_analytique');


$routes->post('cout_elevage-form', 'AnalytiqueController::cout_elevage_form');
$routes->get('cout_elevage_list', 'AnalytiqueController::cout_elevage_list');
$routes->post('cout_production_general-form', 'AnalytiqueController::cout_production_general_form');
$routes->get('cout_production_general_list', 'AnalytiqueController::cout_production_general_list');


