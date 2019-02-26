<?php
/**
 * Created by PhpStorm.
 * User: tunbolawande
 * Date: 25/02/2019
 * Time: 5:06 PM
 */

class CRM_CiviEngagementScoring_Rules_Actions_ContactEngagementScore extends CRM_Civirules_Action {

  /**
   * Method to return the url for additional form processing for action
   * and return false if none is needed
   *
   * @param int $ruleActionId
   * @return bool
   * @access public
   */
  public function getExtraDataInputUrl($ruleActionId) {
    return CRM_Utils_System::url('civicrm/civiengagement/form/action/engagementscore', 'rule_action_id='.$ruleActionId);
  }

  /**
   * Method processAction to execute the action
   *
   * @param CRM_Civirules_TriggerData_TriggerData $triggerData
   * @access public
   *
   */
  public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $contactId = $triggerData->getContactId();

    $subTypes = CRM_Contact_BAO_Contact::getContactSubType($contactId);
    $contactType = CRM_Contact_BAO_Contact::getContactType($contactId);

    $changed = false;
    $action_params = $this->getActionParameters();
    foreach($action_params['sub_type'] as $sub_type) {
      if (CRM_Contact_BAO_ContactType::isExtendsContactType($sub_type, $contactType)) {
        $subTypes[] = $sub_type;
        $changed = true;
      }
    }
    if ($changed) {
      $params['id'] = $contactId;
      $params['contact_id'] = $contactId;
      $params['contact_type'] = $contactType;
      $params['contact_sub_type'] = $subTypes;
      CRM_Contact_BAO_Contact::add($params);
    }
  }
}
