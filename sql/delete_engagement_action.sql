DELETE FROM civirule_rule_action WHERE action_id IN (SELECT id FROM civirule_action WHERE name IN ('decrease_engagement_score', 'increase_engagement_score'));

DELETE FROM civirule_action WHERE name IN ('decrease_engagement_score', 'increase_engagement_score');
