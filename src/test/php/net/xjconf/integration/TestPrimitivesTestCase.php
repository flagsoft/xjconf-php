<?php
/**
 * Integration test with TestPrimitives.
 *
 * @author      Frank Kleine <mikey@xjconf.net>
 * @package     XJConf
 * @subpackage  test_integration
 */
use net\xjconf\DefinitionParser;
use net\xjconf\XmlParser;
require_once EXAMPLES_DIR . '/ColorPrimitives.php';
/**
 * Integration test with TestPrimitives.
 *
 * @package     XJConf
 * @subpackage  test_integration
 */
class TestPrimitivesTestCase extends UnitTestCase
{
    /**
     * test if primitives and keyAttribute works
     */
    public function testPrimitives()
    {
        $tagParser = new DefinitionParser();
        $defs      = $tagParser->parse(EXAMPLES_DIR . '/xml/defines-primitives.xml');
        
        $conf      = new XmlParser();
        $conf->setTagDefinitions($defs);
        $conf->parse(EXAMPLES_DIR . '/xml/test-primitives.xml');
        $this->assertEqual($conf->getConfigValue('color')->getRGB(), '#643214');
        $this->assertEqual($conf->getConfigValue('color')->getName(), 'My color');
        $this->assertTrue($conf->getConfigValue('bool'));
        $this->assertEqual($conf->getConfigValue('zahl'), 453);
    }
}
?>