<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class Helpers
{
    /**
     * Get the default language code
     *
     * @return string
     */
    public static function default_lang()
    {
        return config('app.locale', 'en');
    }

    /**
     * Remove invalid characters from a string
     *
     * @param string $str
     * @return string
     */
    public static function remove_invalid_charcaters($str)
    {
        return str_replace(["'", '"', ',', ';', '<', '>', '?'], '', $str);
    }

    /**
     * Translate a key to the current locale
     *
     * @param string $key
     * @return string
     */
    public static function translate($key)
    {
        $local = session('locale', self::default_lang());
        App::setLocale($local);

        try {
            $langPath = resource_path('lang/' . $local . '/messages.php');

            // Create the language file if it doesn't exist
            if (!File::exists($langPath)) {
                if (!File::exists(dirname($langPath))) {
                    File::makeDirectory(dirname($langPath), 0755, true);
                }
                File::put($langPath, "<?php\n\nreturn [];\n");
            }

            $lang_array = include ($langPath);
            $processed_key = ucfirst(str_replace('_', ' ', self::remove_invalid_charcaters($key)));

            if (!is_array($lang_array)) {
                $lang_array = [];
            }

            if (!array_key_exists($key, $lang_array)) {
                $lang_array[$key] = $processed_key;
                $str = "<?php\n\nreturn " . var_export($lang_array, true) . ";\n";
                File::put($langPath, $str);
                $result = $processed_key;
            } else {
                $result = $lang_array[$key];
            }
        } catch (\Exception $exception) {
            // Fallback to the key itself
            $result = $key;
        }

        return $result;
    }
}
