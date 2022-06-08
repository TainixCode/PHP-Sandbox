<?php
declare(strict_types=1);

use Tainix\DataFormater;
use PHPUnit\Framework\TestCase;

final class DataFormaterTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function test_dataToCode(): void
    {
        $data = [
            'name' => 'John',
            'age' => 18
        ];

        $result = DataFormater::dataToCode($data);

        $this->assertEquals(
            $result,
            '$name = \'John\';' . "\n" .
            '$age = 18;' . "\n"
        );
    }
    
    public function test_dataToCode_array(): void
    {
        $data = [
            'name' => 'John',
            'languages' => ['php', 'js', 'python']
        ];

        $result = DataFormater::dataToCode($data);

        $this->assertEquals(
            $result,
            '$name = \'John\';' . "\n" .
            '$languages = [\'php\', \'js\', \'python\'];' . "\n"
        );
    }

    public function test_dataToDebug(): void
    {
        $data = [
            'name' => 'John',
            'age' => 18
        ];

        $result = DataFormater::dataToDebug($data);

        $this->assertEquals(
            $result,
            'Html::debug($name, \'$name\');' . "\n" .
            'Html::debug($age, \'$age\');' . "\n"
        );
    }

    public function test_dataFromData(): void
    {
        $data = [
            'name' => 'John',
            'age' => 18
        ];

        $result = DataFormater::dataFromData($data);

        $this->assertEquals(
            $result,
            '$name = $data[\'name\'];' . "\n" .
            '$age = $data[\'age\'];' . "\n"
        );
    }
}