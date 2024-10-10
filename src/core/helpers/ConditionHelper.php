<?php

namespace BarrelStrength\Sprout\core\helpers;

use BarrelStrength\Sprout\core\components\elements\conditions\TwigExpressionConditionRule;
use craft\base\Element;
use craft\events\RegisterConditionRulesEvent;

class ConditionHelper
{
    public static function registerConditionRuleTypes(RegisterConditionRulesEvent $event): void
    {
        $elementType = $event->sender?->elementType ?? null;

        if ($elementType === null) {
            return;
        }

        if (!is_subclass_of($elementType, Element::class)) {
            return;
        }

        // Feature Request: Is there a way to indicate a condition does not modify Element queries
        $event->conditionRules[] = TwigExpressionConditionRule::class;
    }
}
