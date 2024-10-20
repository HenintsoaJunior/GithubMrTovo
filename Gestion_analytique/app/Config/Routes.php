<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// CRUD Routes
$routes->get('produit-list', 'produitController::index');
$routes->get('produit-form', 'produitController::create');
$routes->post('submit-produit-form', 'produitController::insertproduit');
$routes->get('edit-produit/(:num)', 'produitController::singleproduit/$1');
$routes->post('update-produit', 'produitController::updateproduit');
$routes->get('delete-produit/(:num)', 'produitController::deleteproduit/$1');

$routes->get('stock-list', 'StockController::index');
$routes->get('stock-form', 'StockController::create');
$routes->post('submit-stock-form', 'StockController::insertstock');
$routes->get('edit-stock/(:num)', 'StockController::singlestock/$1');
$routes->post('update-stock', 'StockController::updatestock');
$routes->get('delete-stock/(:num)', 'StockController::deletestock/$1');




$routes->get('global', 'AnalytiqueController::global');
$routes->get('voir-centre/(:num)', 'AnalytiqueController::global_centre_rubrique/$1');
$routes->get('formulaire_analytique', 'AnalytiqueController::formulaire_analytique');
$routes->post('submit-analytique-form', 'AnalytiqueController::insert_analytique_form');
$routes->get('total_montant_analytique', 'AnalytiqueController::total_montant_analytique');


$routes->post('cout_elevage-form', 'AnalytiqueController::cout_elevage_form');
$routes->get('cout_elevage_list', 'AnalytiqueController::cout_elevage_list');
$routes->post('cout_production_general-form', 'AnalytiqueController::cout_production_general_form');
$routes->get('cout_production_general_list', 'AnalytiqueController::cout_production_general_list');
$routes->post('exercice', 'AnalytiqueController::exercice');
$routes->get('exerciceform', 'AnalytiqueController::exerciceform');




$routes->get('loginPage', 'LoginController::loginPage');
$routes->post('login', 'LoginController::login');
$routes->get('dashboardAdmin', 'Home::dashboardAdmin');
$routes->get('dashboardUser', 'Home::dashboardUser');
$routes->get('dashboardCompta', 'Home::dashboardCompta');


$routes->get('logout', 'LoginController::logout');

$routes->get('achatform', 'AchatController::achatform');

$routes->get('venteform', 'VenteController::venteform');
$routes->post('vente_validate', 'VenteController::vente_validate');
$routes->get('liste_vente', 'Bon_receptionController::liste_vente');
$routes->get('liste_vente_admin', 'Bon_receptionController::liste_vente_admin');
$routes->get('valider_bon_reception', 'Bon_receptionController::valider_bon_reception');
$routes->get('vente_valider', 'Bon_receptionController::vente_valider');
$routes->get('facture_pdf', 'Bon_receptionController::facture_pdf');



$routes->get('bon_sortie-list', 'Bon_sortieController::index');
$routes->get('bon_livraison-list', 'Bon_livraisonController::index');
$routes->post('achat', 'AchatController::achat');

$routes->get('pro_format_charge-list', 'Pro_format_chargeController::index');
$routes->get('pro_format_produit-list', 'Pro_format_produitController::index');

$routes->get('pro_format_charge_user', 'Pro_format_chargeController::pro_format_charge_user');
$routes->get('pro_format_produit_user', 'Pro_format_produitController::pro_format_produit_user');
$routes->get('annuler_proformat_produit', 'Pro_format_produitController::annuler_proformat_produit');
$routes->get('annuler_proformat_charge', 'Pro_format_chargeController::annuler_proformat_charge');


$routes->get('valider_proformat_charge', 'Pro_format_chargeController::valider_proformat_charge');
$routes->get('valider_proformat_produit', 'Pro_format_produitController::valider_proformat_produit');

$routes->get('achat_valider_pfc', 'Pro_format_chargeController::achat_valider_pfc');
$routes->get('achat_valider_pfp', 'Pro_format_produitController::achat_valider_pfp');


$routes->get('compta_sous_ecriture', 'ComptaSousEcriture::compta_sous_ecriture');
$routes->get('annuler_bon_reception', 'Bon_receptionController::annuler_bon_reception');
$routes->get('getdetails_bon_reception', 'Bon_receptionController::getdetails_bon_reception');




$routes->get('get_produit_unite', 'ProduitController::get_produit_unite');
$routes->get('get_charge_unite', 'ChargesController::get_charge_unite');

$routes->get('getBon_livraisonDetails', 'Bon_livraisonController::getBon_livraisonDetails');
$routes->get('getBon_sortieDetails', 'Bon_sortieController::getBon_sortieDetails');


$routes->get('facture_bon_livraison_pdf', 'Bon_livraisonController::facture_bon_livraison_pdf');
$routes->get('facture_bon_sortie_pdf', 'Bon_sortieController::facture_bon_sortie_pdf');









