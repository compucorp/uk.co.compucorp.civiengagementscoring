<script type="text/javascript">
  {literal}

  CRM.$(function($) {
    positionEngagementWidget();
    CRM.$( "#progressbar" ).progressbar({
      value: {/literal} {$engagementPoint} {literal}
    });
  });

  function positionEngagementWidget() {
    // Move fields
    CRM.$('#contact_engagement_score').insertAfter(CRM.$('#contactname-block'));
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
