<?php

use CRM_CiviEngagementScoring_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_CiviEngagementScoring_Form_EngagementScore extends CRM_CivirulesActions_Form_Form {

  public function buildQuickForm() {
    $this->add('hidden', 'rule_action_id');
    // add form elements
    $this->add(
      'text',
      'engagement_points',
      'Points',
      [],
      TRUE
    );
    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));
  }

  public function postProcess() {
    if (isset($this->_submitValues['engagement_points'])) {
      $data['engagement_points'] = $this->_submitValues['engagement_points'];
      $this->ruleAction->action_params = serialize($data);
      $this->ruleAction->save();
    }

    parent::postProcess();
  }
}
