<?php

/**
 * Class CRM_CiviEngagementScoring_Hook_PageRun_AddEngagementScoringWidget
 */
class CRM_CiviEngagementScoring_Hook_PageRun_AddEngagementScoringWidget {

  /**
   * @var string
   *   Path where template with new fields is stored.
   */
  private $templatePath;

  /**
   * CRM_CiviEngagementScoring_Hook_PageRun_AddEngagementScoringWidget constructor.
   */
  public function __construct() {
    $this->templatePath = CRM_CiviEngagementScoring_ExtensionUtil::path() . '/templates';
  }

  /**
   * Handles hook.
   *
   * @param CRM_Core_Page $page
   */
  public function handle($page) {
    if (!$this->shouldHandle($page)) {
      return;
    }

    $this->addWidgetToContactDashboard($page);
  }

  /**
   * Adds the widget to the contact dashboard
   *
   * @param CRM_Core_Page $page
   */
  private function addWidgetToContactDashboard($page) {
    CRM_Core_Resources::singleton()->addStyleFile('uk.co.compucorp.civiengagementscoring', 'css/style.css');
    CRM_Core_Region::instance('page-body')->add([
      'template' => "{$this->templatePath}/CRM/Page/Contact/EngagementWidget.tpl"
    ]);
    $page->assign('engagementPoint', $this->getContactEngagementPoint());
  }

  /**
   * Checks if this is the right page
   *
   * @param CRM_Core_Page $page
   *
   * @return bool
   */
  private function shouldHandle($page) {
    return $page instanceof CRM_Contact_Page_View_Summary;
  }

  /**
   * Gets the engagement points for the contact.
   *
   * @return int
   */
  private function getContactEngagementPoint() {
    $contactId = CRM_Utils_Request::retrieve('cid', 'Integer');
    $customFieldID = CRM_Core_BAO_CustomField::getCustomFieldID('Engagement_Points', 'Engagement Scoring');
    $customFieldName = "custom_" . $customFieldID;
    $engagementPoints = 0;

    if ($contactId && $customFieldID) {
      $result = civicrm_api3('Contact', 'getsingle', [
        'return' => [$customFieldName],
        'id' => $contactId,
      ]);

      if (!empty($result[$customFieldName])) {
        $engagementPoints = $result[$customFieldName];
      }
    }

    return $engagementPoints;
  }
}
