<script type="text/javascript">
  {literal}
  var $ = CRM.$;
  var currentEngagementValue = {/literal} {$engagementPoint} {literal};

  $(function () {
    positionEngagementWidget();
    initEngagementWidget();
  });

  /**
   * Initiates the widget with the current engagement value
   */
  function initEngagementWidget () {
    $('#progressbar').progressbar({ value: currentEngagementValue });
  }

  /**
   * Injects the widget into CiviCRM Contact Name block
   */
  function positionEngagementWidget () {
    $('#contact_engagement_score').insertAfter($('#contactname-block'));
  }
  {/literal}
</script>

<div id="contact_engagement_score">
  <div class="engagement-block engagement-block-content">
    <div class="engagement_text">Engagement Score</div>
    <div class="engagement_score">{$engagementPoint}</div>
    <div id="progressbar" class="engagement_progress_bar"></div>
  </div>
</div>
