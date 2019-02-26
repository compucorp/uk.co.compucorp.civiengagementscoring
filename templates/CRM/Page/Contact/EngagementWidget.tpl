<script type="text/javascript">
  {literal}

  CRM.$(function($) {
    positionEngagementWidget();
  });

  function positionEngagementWidget() {
    // Move fields
    CRM.$('#contact_engagement_score').insertAfter(CRM.$('#contactname-block'));
  }
  {/literal}

</script>
<div id="contact_engagement_score">
  <div class="engagement_text">Engagement Score</div>
  <div class="engagement_score">100</div>
  <br/>
  <div class="engagement_progress_bar"></div>

</div>
