<?php
namespace Tainix;

abstract class App
{
    public const GET_KEY_CHALLENGE = 'challenge';
    public const GET_KEY_TYPE = 'type';

    public const POST_KEY_BUILD = 'build';

    public const TYPE_API = 'api';
    public const TYPE_LOCAL = 'local';

    public const SUFFIX_API_FILE = '_api.php';
    public const SUFFIX_LOCAL_FILE = '_local.php';
    public const SUFFIX_TEST_PEST_FILE = 'Test.php';
    public const SUFFIX_TEST_PHPUNIT_FILE = 'Test.php.default';
}