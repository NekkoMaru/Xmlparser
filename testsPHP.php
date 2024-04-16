<?php

use PHPUnit\Framework\TestCase;

require 'reformatter.php'; 

class PrettyPrintXMLTest extends TestCase
{
    public function testSingleElement()
    {
        $xml = "<root></root>";
        $expected = "\n<root>\n</root>";
        $this->assertEquals($expected, prettyPrintXML($xml));
    }

    public function testSelfClosingTag()
    {
        $xml = "<root><child/></root>";
        $expected = "\n<root>\n  <child/>\n</root>";
        $this->assertEquals($expected, prettyPrintXML($xml));
    }

    public function testComplexStructure()
    {
        $xml = "<root><parent><child attribute='value'>Text</child><child/></parent></root>";
        $expected = "\n<root>\n  <parent>\n    <child attribute='value'>Text\n    </child>\n    <child/>\n  </parent>\n</root>";
        $this->assertEquals($expected, prettyPrintXML($xml));
    }


    public function testEmptyXML()
    {
        $xml = "";
        $expected = "";
        $this->assertEquals($expected, prettyPrintXML($xml));
    }
}
?>
