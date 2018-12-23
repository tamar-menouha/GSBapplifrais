<?php
/**
 * Index du projet GSB
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */


//ce qu'on a besoin en préliminaire
require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';

session_start();
/*
 * session est une variable superglobale qui permet de comporter différentes variables tel visiteur, nom prénom ...
 */
// On appelle la methode de la classe pdogsb
$pdo = PdoGsb::getPdoGsb();
// on appelle la methode de la classe fct.inc qui sert à vérifier si un client s'est connecté
$estConnecte = estConnecte();
require 'vues/v_entete.php';
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
/*$uc est une variable qui va prendre différentes valeurs au cours du projet et
 * selon sa valeur, différentes phases vont se mettre en place tel connexion,
 * accueil...
 */

switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
}
require 'vues/v_pied.php';
