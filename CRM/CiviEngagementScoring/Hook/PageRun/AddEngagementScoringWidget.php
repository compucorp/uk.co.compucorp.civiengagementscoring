<?php

class CRM_CiviEngagementScoring_Hook_PageRun_AddEngagementScoringWidget {

  /**
   * @var string
   *   Path where template with new fields is stored.
   */
  private $templatePath;

  public function __construct() {
    $this->templatePath = CRM_CiviEngagementScoring_ExtensionUtil::path() . '/templates';
  }

  public function handle($page) {
    if (!$this->shouldHandle($page)) {
      return;
    }

    $this->addWidgetToContactDashboard();
  }

  private function addWidgetToContactDashboard() {
    CRM_Core_Resources::singleton()->addStyleFile('uk.co.compucorp.civiengagementscoring', 'css/style.css');
    CRM_Core_Region::instance('page-body')->add([
      'template' => "{$this->templatePath}/CRM/Page/Contact/EngagementWidget.tpl"
    ]);
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
}
