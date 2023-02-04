<?php
/**
 * @package JhosagidPlugin
 */

class JhosagidPluginDeactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}