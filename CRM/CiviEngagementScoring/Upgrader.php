<?php
use CRM_CiviEngagementScoring_ExtensionUtil as E;

/**
 * Collection of upgrade steps.
 */
class CRM_CiviEngagementScoring_Upgrader extends CRM_Civiengagementscoring_Upgrader_Base {

  // By convention, functions that look like "function upgrade_NNNN()" are
  // upgrade tasks. They are executed in order (like Drupal's hook_update_N).

  /**
   * Example: Run an external SQL script when the module is installed.
   */
  public function install() {
    if ($this->isExtensionEnabled('org.civicoop.civirules')) {
      $this->executeSqlFile('sql/create_engagement_action.sql');
    }
  }

  public function isExtensionEnabled($key) {
    $isEnabled = CRM_Core_DAO::getFieldValue(
      'CRM_Core_DAO_Extension',
      $key,
      'is_active',
      'full_name'
    );

    return !empty($isEnabled) ? TRUE : FALSE;
  }
}

