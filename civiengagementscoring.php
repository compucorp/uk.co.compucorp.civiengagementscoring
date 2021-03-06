<?php

require_once 'civiengagementscoring.civix.php';
use CRM_CiviWngagementScoring_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function civiengagementscoring_civicrm_config(&$config) {
  _civiengagementscoring_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function civiengagementscoring_civicrm_xmlMenu(&$files) {
  _civiengagementscoring_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function civiengagementscoring_civicrm_install() {
  _civiengagementscoring_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function civiengagementscoring_civicrm_postInstall() {
  _civiengagementscoring_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function civiengagementscoring_civicrm_uninstall() {
  _civiengagementscoring_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function civiengagementscoring_civicrm_enable() {
  _civiengagementscoring_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function civiengagementscoring_civicrm_disable() {
  _civiengagementscoring_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function civiengagementscoring_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _civiengagementscoring_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function civiengagementscoring_civicrm_managed(&$entities) {
  _civiengagementscoring_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function civiengagementscoring_civicrm_caseTypes(&$caseTypes) {
  _civiengagementscoring_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function civiengagementscoring_civicrm_angularModules(&$angularModules) {
  _civiengagementscoring_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function civiengagementscoring_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _civiengagementscoring_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function civiengagementscoring_civicrm_entityTypes(&$entityTypes) {
  _civiengagementscoring_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implementation of hook_civicrm_pageRun
 */
function civiengagementscoring_civicrm_pageRun($page) {
  $hooks = [
    new CRM_CiviEngagementScoring_Hook_PageRun_AddEngagementScoringWidget(),
  ];

  foreach ($hooks as $hook) {
    $hook->handle($page);
  }
}
