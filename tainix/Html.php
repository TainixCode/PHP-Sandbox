<?php
namespace Tainix;

final class Html
{
	private const URL_TAINIX_CHALLENGE = 'https://tainix.fr/engines/code/';

	public static function header(string $name): string
	{
		return <<< HEADER
		<!DOCTYPE html>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
		<head>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <title>$name</title>
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
		</head>
		<body>
		<div class="container">
		<div class="row">
		<div class="column">
		HEADER;
	}

	public static function title(string $title): string
	{
		return <<< TITLE
		<h2 class="title">$title</h2>
		TITLE;
	}

	public static function subTitle(string $subTitle): string
	{
		return <<< TITLE
		<h4 class="title">$subTitle</h4>
		TITLE;
	}

	public static function quote(string $words, string $class = ''): string
	{
		return <<< QUOTE
		<blockquote class="$class">
		  <p><em>$words</em></p>
		</blockquote>
		QUOTE;
	}

	public static function challengeTitle(string $code): string
	{
		$title = self::title('TAINIX \ ' . $code);
		$link = self::link(['url' =>  self::URL_TAINIX_CHALLENGE . $code, 'name' => '&rarr; Consulter l\'énoncé', 'blank' => true]);

		return <<< TITLE
		<div class="row">
		<div class="column">$title</div>
		<div class="column column-title">$link</div>
		</div>
		TITLE;
	}

	public static function challengeSubTitle(string $code, string $type): string
	{
		$title = self::subTitle(strtoupper($type));

		$otherType = ($type == App::TYPE_API) ? App::TYPE_LOCAL : App::TYPE_API;

		$link = self::link(['url' =>  $code . '_' . $otherType, 'name' => 'Version ' . $otherType, 'class' => 'button-outline']);

		return <<< TITLE
		<div class="row">
		<div class="column">$title</div>
		<div class="column column-subtitle">$link</div>
		</div>
		TITLE;
	}

	/**
	 * @param array<string, string|bool> $link
	 */
	public static function link(array $link): string
	{
		$url = $link['url'];
		$name = $link['name'];

		$blank = (isset($link['blank'])) ? ' target="_blank"' : '';

		$class = 'button ' . ($link['class'] ?? '');

		return <<< LINK
		<a href="$url" class="$class"$blank>$name</a>
		LINK;
	}

	/**
	 * @param array<string, string> $link
	 */
	public static function postButton(array $link): string
	{
		$url = $link['url'];
		$name = $link['name'];
		$value = $link['value'];

		$class = 'button ' . ($link['class'] ?? '');

		return <<< BUTTON
		<form action="$url" method="post">
		<input type="submit" name="$name" value="$value" class="$class" />
		</form>
		BUTTON;

	}

	public static function footer(): string
	{
		return <<< FOOTER
		</div>
		</div>
		</div>
		<style>
		h2 {margin-top: 15px;}
		a {color: #3975b2}
		.no-margin {margin-bottom: 0!important;}
		input.button, .button{background-color: #3975b2; border: 0.1rem solid #3975b2;}
		.button-outline {color: #3975b2!important;}
		textarea:focus {border-color: #3975b2}
		pre {border-left: 0.3rem solid #3975b2;}
		blockquote.success, pre.success {border-left: 0.3rem solid #2CD4A2;}
		blockquote.danger, pre.danger {border-left: 0.3rem solid #F9655B;}
		.column-title {text-align: right; padding-top: 17px!important;}
		.column-subtitle {text-align: right;}
		</style>
		</body>
		</html>
		FOOTER;
	}

	/**
	 * @param mixed $var
	 */
	public static function debug($var, string $name = '', string $class = ''): void
	{
		if ($name != '') {
			echo '<p class="no-margin">' . $name . '</p>';
		}

		echo '<pre class="'. $class .'"><code>';
		print_r($var);
		echo '</code></pre>';
	}
}