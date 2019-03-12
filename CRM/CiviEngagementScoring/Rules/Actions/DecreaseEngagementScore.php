<?php

use CRM_CiviEngagementScoring_Rules_Actions_ContactEngagementScore as ContactEngagementScore;

class CRM_CiviEngagementScoring_Rules_Actions_DecreaseEngagementScore extends ContactEngagementScore {

  /**
   * Method processAction to execute the action. Basically the contact engagement
   * points is decreased by the number of points set for the action.
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
      $updatedEngagementPoints = $contactEngagementPoints - $actionEngagementPoints;
      $updatedPoints = $updatedEngagementPoints < 0 ? 0 : $updatedEngagementPoints;

      $this->updateContactEngagementPoints(
        $contactId,
        $updatedPoints
      );
    }
  }
}
