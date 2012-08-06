<?php

namespace spec\PHPSpec2\Matcher;

use PHPSpec2\Specification;
use stdClass;

class EqualityMatcher implements Specification
{
    private static $NO_ARGUMENTS = array();

    function described_with($matcher)
    {
        $matcher->is_an_instance_of('PHPSpec2\Matcher\EqualityMatcher');
    }

    function should_support_the_be_alias_matcher_for_all_kinds_of_subjects($matcher)
    {
        $this->supports_alias_for_all_kinds('be', $matcher);
    }

    function should_support_the_be_equal_to_alias_for_all_kinds_of_subjects($matcher)
    {
        $this->supports_alias_for_all_kinds('be_equal_to', $matcher);
    }

    function should_support_return_alias_for_all_kinds_of_subjects($matcher)
    {
        $this->supports_alias_for_all_kinds('return', $matcher);
    }

    function should_support_equal_alias_for_all_kinds_of_subjects($matcher)
    {
        $this->supports_alias_for_all_kinds('equal', $matcher);
    }

    private function supports_alias_for_all_kinds($alias, $matcher)
    {
        foreach ($this->all_kinds_of_subjects() as $kind => $subject) {
            $matcher->supports($alias, $subject, self::$NO_ARGUMENTS)->should_be_true();
        }
    }

    private function all_kinds_of_subjects()
    {
        return array(
            'string' => 'some_string',
            'integer' => 42,
            'object' => new stdClass,
            'array'  => array(),
            'boolean' => true,
            'resource' => STDIN
        );
    }
}