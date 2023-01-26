function format_url($url, $type = '')
{
    $url = preg_replace("`\[.*\]`U", "", $url);
    $url = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $url);
    $url = htmlentities($url, ENT_NOQUOTES, 'ISO-8859-1');
    $url = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i", "\\1", $url);
    $url = preg_replace(array("`[^a-z0-9]`i", "`[-]+`"), "-", $url);
    $url = ($url == "") ? $type : strtolower(trim($url, '-'));
    return $url;
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https";
else
    $url = "http";

// Ajoutez // à l'URL.
$url .= "://";

// Ajoutez l'hôte (nom de domaine, ip) à l'URL.
$url .= $_SERVER['HTTP_HOST'];

// Ajouter l'emplacement de la ressource demandée à l'URL
$url .= $_SERVER['REQUEST_URI'];

// Afficher l'URL
echo $url;