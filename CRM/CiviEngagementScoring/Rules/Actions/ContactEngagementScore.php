<?php

class CRM_CiviEngagementScoring_Rules_Actions_ContactEngagementScore extends CRM_Civirules_Action {

  /**
   * @var string
   */
  private $engagementPointsCustomFieldId = '';

  /**
   * Method to return the url for additional form processing for action
   * and return false if none is needed
   *
   * @param int $ruleActionId
   * @return bool
   * @access public
   */
  public function getExtraDataInputUrl($ruleActionId) {
    return CRM_Utils_System::url('civicrm/civirule/form/action/engagementscore', 'rule_action_id='.$ruleActionId);
  }

  /**
   * Method processAction to execute the action
   *
   * @param CRM_Civirules_TriggerData_TriggerData $triggerData
   *
   */
  public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData) {

  }

  public function userFriendlyConditionParams() {
    $params = $this->getActionParameters();
    if (!empty($params['engagement_points'])) {
      return "Points: ". $params['engagement_points'];
    }
  }

  /**
   * Returns the contact's engagement points
   *
   * @param int $contactID
   */
  protected function getContactEngagementPoints($contactID) {
    $customFieldName = "custom_" . $this->getEngagementPointsCustomFieldId();
    $engagementPoints = 0;
    $result = civicrm_api3('Contact', 'getsingle', [
      'return' => [$customFieldName],
      'id' => $contactID,
    ]);

    if (!empty($result[$customFieldName])) {
      $engagementPoints = $result[$customFieldName];
    }

    return $engagementPoints;
  }

  /**
   * Updates the contact's engagement points.
   *
   * @param int $contactID
   * @param mixed $engagementPoints
   */
  protected function updateContactEngagementPoints($contactID, $engagementPoints) {
    $customFieldName = "custom_" . $this->getEngagementPointsCustomFieldId();
    civicrm_api3('Contact', 'create', [
      'id' => $contactID,
      "$customFieldName" => $engagementPoints
    ]);
  }

  /**
   * Returns the custom field id for the engagement points custom field.
   *
   * @return string
   */
  protected function getEngagementPointsCustomFieldId() {
    if (empty($this->engagementPointsCustomFieldId)) {
      $this->engagementPointsCustomFieldId = CRM_Core_BAO_CustomField::getCustomFieldID(
        'Engagement_Points',
        'Engagement Scoring'
      );
    }


    return $this->engagementPointsCustomFieldId;
  }
}
