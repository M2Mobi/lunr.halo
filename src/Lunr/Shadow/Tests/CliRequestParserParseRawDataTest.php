<?php

/**
 * This file contains the CliRequestParserParseRawDataTest class.
 *
 * PHP Version 5.4
 *
 * @category   Libraries
 * @package    Shadow
 * @subpackage Tests
 * @author     Heinz Wiesinger <heinz@m2mobi.com>
 * @copyright  2015, M2Mobi BV, Amsterdam, The Netherlands
 * @license    http://lunr.nl/LICENSE MIT License
 */

namespace Lunr\Shadow\Tests;

/**
 * Basic tests for the case of empty superglobals.
 *
 * @category      Libraries
 * @package       Shadow
 * @subpackage    Tests
 * @author        Heinz Wiesinger <heinz@m2mobi.com>
 * @covers        Lunr\Shadow\CliRequestParser
 * @backupGlobals enabled
 */
class CliRequestParserParseRawDataTest extends CliRequestParserTest
{

    /**
     * Test storing raw request data.
     *
     * @requires extension runkit
     * @covers   Lunr\Shadow\CliRequestParser::parse_raw_data
     */
    public function testParseRawData()
    {
        $this->mock_function('file_get_contents', 'return "raw";');

        $result = $this->class->parse_raw_data();

        $this->assertEquals('raw', $result);

        $this->unmock_function('file_get_contents');
    }

}

?>
