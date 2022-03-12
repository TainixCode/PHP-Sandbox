<?php
namespace Tainix;

final class DataFormater
{
	/**
	 * @param array<string, mixed> $data
	 */
	public static function dataToCode(array $data): string
	{
		$str = '';

		foreach ($data as $name => $value) {
			$str .= '$' . $name . ' = ';
			if (is_array($value)) {
				$str .= '[' . implode(', ', array_map([__CLASS__, 'phpFormatValue'], $value)) . ']';
			} else {
				$str .= self::phpFormatValue($value);
			}

			$str .= ';' . "\n";
		}

		return $str;
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function dataToDebug(array $data): string
	{
		$str = '';

		foreach ($data as $name => $value) {
			$str .= 'Html::debug($' . $name . ', \'$'. $name .'\');' . "\n";
		}

		return $str;
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function dataFromData(array $data): string
	{
		$str = '';

		foreach ($data as $name => $value) {
			$str .= '$' . $name . ' = $data[\''. $name .'\'];' . "\n";
		}

		return $str;
	}

	/**
	 * @param int|string $value
	 */
	private static function phpFormatValue($value): string
	{
		if (is_string($value)) {
			return "'$value'";
		}

		return (string) $value;
	}
}