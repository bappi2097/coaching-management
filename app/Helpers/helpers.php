<?php
function htmlLangDir()
{
    $lang = app()->getLocale();
    $dir = $lang == "ar" ? "rtl" : "auto";
    return "lang=$lang dir=$dir";
}

function isPageRTL()
{
    return app()->getLocale() == "ar" ? true : false;
}

/**
 * active
 *
 * @param  string $route
 * @param  string $text
 * @return string
 */
if (!function_exists('active')) {
    function active($route, $text = "active"): string
    {
        return request()->route()->getName() == $route ? $text : '';
    }
}

/**
 * set_active
 *
 * @param  string $path
 * @param  string $active
 * @return string
 */
if (!function_exists('set_active')) {
    function set_active($path, $active = 'active'): string
    {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }
}

if (!function_exists('dropdownActive')) {
    function dropdownActive($path)
    {
        return call_user_func_array('Request::is', (array)$path) || call_user_func_array('Request::is', (array)($path . "/*")) ? true : false;
    }
}

/**
 * notification
 *
 * @param  string $alert_type
 * @param  string $message
 * @return array
 */
if (!function_exists("notification")) {
    function notification($alert_type, $message): array
    {
        $notification['alert-type'] = $alert_type;
        $notification['message'] = $message;
        return $notification;
    }
}

/**
 * dashboardURL return dashboard path for 
 * logged in users
 *
 * @return string
 */
if (!function_exists("dashboardURL")) {
    function dashboardURL(): string
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('officer')) {
                return route('officer.dashboard');
            } else {
                return "/";
            }
        }
        return "/";
    }
}

/**
 * selected
 *
 * @param  int $data1
 * @param  int|array $data2
 * @param  string $text
 * @return string $text|''
 */
if (!function_exists('selected')) {
    function selected($data1, $data2, $text = 'selected'): string
    {
        if (!is_array($data2)) {
            return $data1 == $data2 ? $text : '';
        } else {
            return in_array($data1, $data2) ? $text : '';
        }
    }
}


/**
 * time_elapsed_string
 *
 * @param  string $datetime
 * @param  boolean $full
 * @return string
 */
function time_elapsed_string($datetime, $full = false): string
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

/**
 * dashboard_asset
 *
 * @param  string $path
 * @return string
 */
if (!function_exists("dashboard_asset")) {
    function dashboard_asset($path = ''): string
    {
        return asset('') . "dashboard/" . $path;
    }
}

/**
 * landing_asset
 *
 * @param  string $path
 * @return string
 */
if (!function_exists("landing_asset")) {
    function landing_asset($path = ''): string
    {
        return asset('') . "landing/" . $path;
    }
}

if (!function_exists("currentUser")) {
    function currentUser()
    {
        $guards = array_keys(config("auth.guards"));
        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                return auth()->guard($guard)->user();
            }
        }
        return null;
    }
}

/**
 * roleText
 *
 * @return string
 */
if (!function_exists('roleText')) {
    function roleText(): string
    {
        if (auth()->check()) {
            $role = ucwords(join(' ', auth()->user()->getRoleNames()->all()));
            return $role;
        }
    }
}

/**
 * randomColor
 *
 * @return string
 */
if (!function_exists('randomColor')) {

    function randomColor($id): string
    {
        $class = ['danger', 'info', 'primary', 'success', 'warning'];
        return $class[$id % 5] ?? '';
    }
}
