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

function active($route, $text = "active")
{
    return request()->route()->getName() == $route ? $text : '';
}

function set_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

/**
 * notification
 *
 * @param  string $alert_type
 * @param  string $message
 * @return array
 */
function notification($alert_type, $message): array
{
    $notification['alert-type'] = $alert_type;
    $notification['message'] = $message;
    return $notification;
}

function dashboardURL()
{
    if (auth()->check()) {
        if (auth()->user()->hasRole('admin')) {
            return route('admin.dashboard');
        } else {
            return route('home');
        }
    }
}

/**
 * selected
 *
 * @param  int $data1
 * @param  int|array $data2
 * @return string 'selected'|''
 */
function selected($data1, $data2): string
{
    if (!is_array($data2)) {
        return $data1 == $data2 ? 'selected' : '';
    } else {
        return in_array($data1, $data2) ? 'selected' : '';
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
function dashboard_asset($path = ''): string
{
    return asset('') . "dashboard/" . $path;
}
