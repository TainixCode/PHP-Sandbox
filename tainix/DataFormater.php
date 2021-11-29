<?php
namespace Tainix;

final class DataFormater
{
	public static function dataToCode(array $data): string
	{
		$str = '';

		foreach ($data as $name => $value) {
			$str .= '$' . $name . ' = ';
			if (is_array($value)) {
				$str .= '[' . implode(', ', array_map(['self', 'phpFormatValue'], $value)) . ']';
			} else {
				$str .= self::phpFormatValue($value);
			}

			$str .= ';' . "\n";
		}

		return $str;
	}

	public static function dataToDebug(array $data): string
	{
		$str = '';

		foreach ($data as $name => $value) {
			$str .= 'Html::debug($' . $name . ', \'$'. $name .'\');' . "\n";
		}

		return $str;
	}

	public static function dataFromData(array $data): string
	{
		$str = '';

		foreach ($data as $name => $value) {
			$str .= '$' . $name . ' = $data[\''. $name .'\'];' . "\n";
		}

		return $str;
	}


	private static function phpFormatValue($value): string
	{
		if (is_string($value)) {
			return "'$value'";
		}

		return (string) $value;
	}
}