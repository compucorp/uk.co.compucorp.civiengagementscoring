<?php

use CRM_CiviEngagementScoring_Rules_Actions_ContactEngagementScore as ContactEngagementScore;

class CRM_CiviEngagementScoring_Rules_Actions_IncreaseEngagementScore extends ContactEngagementScore {

  /**
   * Method processAction to execute the action. Basically the contact engagement
   * points is increased by the number of points set for the action.
   *
   * @param CRM_Civirules_TriggerData_TriggerData $triggerData
   *
   */
  public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $contactId = $triggerData->getContactId();
    $params = $this->getActionParameters();

    if (!empty($params['engagement_points'])) {
      $contactEngagementPoints = $this->getContactEngagementPoints($contactId);
      $actionEngagementPoints = $params['engagement_points'];

      $this->updateContactEngagementPoints(
        $contactId,
        ($contactEngagementPoints + $actionEngagementPoints)
      );
    }
  }
}
