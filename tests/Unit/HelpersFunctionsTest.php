<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class HelpersFunctionsTest.
 */
class HelpersFunctionsTest extends TestCase
{
    /** @test */
    public function rssFormat()
    {
        $this->assertEquals('1,200,000', rss_format(1200000));
        $this->assertEquals('99,999', rss_format(99999));
    }

    /** @test */
    public function shortGuildName()
    {
        $this->assertEquals('[Z~P]', shortGuildName());
    }

    /** @test */
    public function longGuildName()
    {
        $this->assertEquals('Zjednoczona Polska', longGuildName());
    }
}
